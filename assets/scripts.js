let elements = document.getElementsByClassName("js-sm-woo-form");
let response_element = document.getElementsByClassName('js-sm-response');
Array.from(elements).forEach(function(element) {
    element.addEventListener('submit', sendData);
});

function sendData(e){
    e.preventDefault();
    var formData = new FormData();
    formData.append( 'action', e.target.elements.action.value);
    formData.append( 'nonce', ajax_object.nonce );
    formData.append( 'data', e.target.elements.sm_data.value );
    fetch( ajax_object.ajax_url, {
        method: 'POST',
        body: formData,
    } )
        .then( res => res.text() )
        .then( data => {
            let json_obj = JSON.parse(data);
            response_element[0].innerHTML = '<p class="' + json_obj.data.class + '">' + json_obj.data.status + '</p>';
        })
        .catch( err => console.log( err ) );
}