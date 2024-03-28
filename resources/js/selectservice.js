var list = document.getElementById('serviceList1');
var noOfservices = 1;
var add = document.getElementById('add_service');
var remove = document.getElementById('remove_service');
var listp = list.parentElement;
var list1 = list;

add.addEventListener('click', function(){

    noOfservices++;

    const existingListItem = document.getElementById('serviceList1');
    const newListItem = existingListItem.cloneNode(true);
    newListItem.id = 'serviceList' + noOfservices;
    listp.appendChild(newListItem);
    // document.getElementById('ol').appendChild(newListItem);

    // list1.setAttribute('id', 'serviceList'+noOfservices);
    // listp.appendChild(list);
    // console.log('1'+noOfservices);
});
