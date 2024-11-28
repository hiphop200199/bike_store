$(function(){

    let orderMode = document.getElementById('order-mode');
    let params = new URLSearchParams(location.search);
    let options = document.querySelectorAll('option');
    for(i=0;i<options.length;i++){
        if(options[i].value===params.get('order')){
            options[i].selected = true;
        }
    }
    orderMode.addEventListener('change',function(){
        let newOrder = this.options[this.selectedIndex].value;
        location.href = location.origin + '/bike_store/views/collection.php?' +'type='+params.get('type')+'&order='+newOrder+  '&page='+params.get('page');
    })

});