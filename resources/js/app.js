import './bootstrap';


function renderTag(childID, parentID) {
    const ad_preview = $(`
        <div class='m-5 border' id=${childID}>
        </div>
    `)

    const parent = $("#" + parentID)
    parent.append(ad_preview);
    return ad_preview[0];
    //old
    // const child = document.createElement('DIV')
    // child.setAttribute('id', childID) //container#...
    // child.setAttribute('class', 'm-5')
    // return parent.appendChild(child)
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

function uuidv4() {
    return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
}


const createAd = (ad_data, template) => {
    const id = uuidv4()
    const tagID = `stage_${ad_data.make}_${ad_data.model}_${id}`

    //add tag to dom
    const tag = dynamicTag(tagID);

    console.log(tag)

    //load template canvas into tag with ad data
    const stage = loadStage(template, tag)
    const { height, width } = template.attrs
    $('#' + tagID).prepend(`<h1>height: ${height} width: ${width}</h1>`)
    canvas(stage, ad_data)
}

//entry point

//TODO: get this data from file or database

//adds id to inventory item if needed
//
// const inventory_data = serialized_inventory.map(item => {
// return inventory(item)
// })

const parent_ad_container = 'ad_container'
const dynamicTag = dynamicTagRender(parent_ad_container)

//show ads
// inventory_data.forEach(createAd)

templates.forEach(template => {
    const data = JSON.parse(template.data)
    const { attrs } = data
    const { width, height } = attrs
    console.log(width, height)
    inventory_data.forEach(inventory_item => {
        createAd(inventory_item, data)
    })
})
