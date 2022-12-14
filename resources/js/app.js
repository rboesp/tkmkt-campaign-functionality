import './bootstrap';

function uuidv4() {
    return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
}


function renderCanvasContainer(ad_id, ad_row) {
    const ad_preview = $(`
        <div class='m-1 border border-primary p-2' id=${ad_id}>
        </div>
    `)
    ad_row.append(ad_preview);
    return ad_preview[0];
}

function renderAdRowContainer(rowID, parentID) {
    const parent = $("#" + parentID)
    const row = $(`<div class='m-2 border border-secondary' id=${rowID}></div>`)
    parent.append(row)
    return row
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

function replaceData(stage, data) {
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

function createStage(json, id) {
    return Konva.Node.create(json, id);
}


function createID(ad_data) {
        //make unique id with some template data
        const id = uuidv4()
        const tagID = `stage_${ad_data.make}_${ad_data.model}_${id}`
        return tagID
}

//TODO: need an add space first which includes an add row
//space has details about the row and maybe controls
function renderDetailsArea({width, height}) {
    const ad_row_container_id = `canvas_${width}x${height}_row`
    const ad_row_heading = $(`
        <div class='border border-success p-2 m-2' >
            <h5>Size: ${width}x${height}</h5>
        </div>
    `)
    const ad_row_container = renderAdRowContainer(ad_row_container_id, 'ad_container')
    ad_row_container.append(ad_row_heading)
    return ad_row_container
}

function exctractDetails({width, height}) {
    return {
        width,
        height
    }
}


/* ENTRY POINT */

//templates initialized in blade file
templates.forEach(template => {

    //get canvas details from this template for grouping ads by size
    const deserialized_data = JSON.parse(template.data)
    const { attrs: canvas_attributes } = deserialized_data
    const canvas_details = exctractDetails(canvas_attributes)

    //add container, where grouped ads will be rendered into, to the DOM
    const detailsArea = renderDetailsArea(canvas_details)
    
    //make row here then add it to details area
    const row = $(`    
        <div id="ad_row_${canvas_details.height}_${canvas_details.width}" 
            class="border border-danger d-flex flex-wrap m-2"
        >

        </div>
    `)

    detailsArea.append(row)


    //turn each inventory item into an add, and render it in correct group
    inventory_data.forEach(inventory_item => {
        const ad_id = createID(deserialized_data)
        const tag = renderCanvasContainer(ad_id, row);
        const stage = createStage(deserialized_data, tag)
        replaceData(stage, inventory_item)
    })

})
