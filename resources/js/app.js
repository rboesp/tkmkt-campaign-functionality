import './bootstrap';


function renderCanvasContainer(childID, parent) {
    const ad_preview = $(`
        <div class='m-5 border border-primary' id=${childID}>
        </div>
    `)
    parent.append(ad_preview);
    return ad_preview[0];
    //old
    // const child = document.createElement('DIV')
    // child.setAttribute('id', childID) //container#...
    // child.setAttribute('class', 'm-5')
    // return parent.appendChild(child)
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


const createAd = (ad_data, template, row) => {
    //make unique id with some template data
    const id = uuidv4()
    const tagID = `stage_${ad_data.make}_${ad_data.model}_${id}`

    //create tag and add to dom
    const tag = renderCanvasContainer(tagID, row);
    console.log(tag)

    //create a stage and replace template with ad data
    const stage = loadStage(template, tag)
    canvas(stage, ad_data)
}

function renderAdRowContainer(rowID, parentID) {
    const parent = $("#" + parentID)
    const row = $(`<div class='border border-secondary d-flex' id=${rowID}></div>`)
    parent.append(row)
    return row
}

//entry point

//TODO: get this data from file or database

//adds id to inventory item if needed
//
// const inventory_data = serialized_inventory.map(item => {
// return inventory(item)
// })


//show ads
// inventory_data.forEach(createAd)

templates.forEach(template => {
    const template_data = JSON.parse(template.data)
    const { attrs } = template_data
    const { width, height } = attrs
    console.log(width, height)

    const ad_row_container_id = `canvas_${width}x${height}_row`
    const ad_row_container = renderAdRowContainer(ad_row_container_id, 'ad_container')
    const ad_row_heading = $(`<div>
        <h5>Size: ${width}x${height}</h5>
    </div>`)
    ad_row_container.append(ad_row_heading)

    inventory_data.forEach(inventory_item => {
        //TODO: take out row and append in the outer for each
        createAd(inventory_item, template_data, ad_row_container)
    })
})
