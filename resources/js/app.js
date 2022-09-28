import './bootstrap';

function uuidv4() {
    return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
}


function inventory(make, model, text, background_img, logo_img) {
    const id = uuidv4()
    return {
        id,
        model,
        make,
        text,
        background_img,
        logo_img
    }
}

function renderTag(childID, parentID) {
    const parent = document.getElementById(parentID)
    const child = document.createElement('DIV')
    child.setAttribute('id', childID)
    return parent.appendChild(child)
}

function dynamicTagRender(parentID) {
    return function (childID) {
        return renderTag(childID, parentID)
    }
}

function getImage(type, data) {
    if (type === 'logo') return data.logo_img
    if (type === 'background') return data.background_img
}

function complete(stage, image_object, image_node) {
    image_node.image(image_object)
    stage.batchDraw()

    var dataURL = stage.toDataURL({ pixelRatio: 3 });
    // downloadURI(dataURL, 'stage.png');
}

function canvas(stage, data) {
    //replace text
    let text = stage.findOne('Text')
    text.setAttr('text', data.text)


    //replace all images
    let image_nodes = stage.find('Image')
    image_nodes.forEach(image_node => {
        let image_type = image_node.getAttr('image_type')
        if (!image_type) return

        const img_link = getImage(image_type, data)

        let image_object = new Image();
        image_object.crossOrigin = 'Anonymous';
        image_node.setAttr('src', img_link)
        image_object.src = image_node.getAttr('src')

        image_object.onload = complete(stage, image_object, image_node)
    });
}

function loadStage(json, id) {
    return Konva.Node.create(json, id);
}

const createAd = ad_data => {
    const tagID = `stage_${ad_data.make}_${ad_data.model}_${ad_data.id}`
    const tag = dynamicTag(tagID);
    console.log(tag.id);

    //load template canvas into tag with ad data
    const stage = loadStage(template, tag)
    canvas(stage, ad_data)
}

//entry point
const inventory_data = [
    inventory('volvo', 'xc90', 'Get your volvo XC90 today!', '/assets/xc90.jpg', '/assets/volvo_dealer.png'),
    inventory('infiniti', 'g30', 'Life is better in an infiniti...', '/assets/qx60.jpg', '/assets/infiniti_dealer.png'),
]

const parent_ad_container = 'ad_container'
const dynamicTag = dynamicTagRender(parent_ad_container)

//show ads
inventory_data.forEach(createAd)
