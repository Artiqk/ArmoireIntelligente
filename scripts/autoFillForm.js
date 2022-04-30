let url = new URL(window.location.href);

let allParams = ['armoire_id', 'floor_id', 'area_id', 'sensor_type', 'component', 'restock_quantity'];

allParams.forEach(fillInputForm);

function fillInputForm (inputID) {
    let data = url.searchParams.get(inputID);

    if (data && data !== 'error') {
        document.getElementById(inputID).value = data;
    }
}