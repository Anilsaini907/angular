// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// School-master.php form submission
$('#schoolmaster').submit(function(event) {
event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/school-master',
                        data: $(this).serialize(),
						//dataType: 'json',
                        success: function (data) {
                                //console.log(data);
                                $('#message').html(data);
                        }
                });

        });
		

//Pop up window code
function windowpop(url, width, height) {
var leftPosition, topPosition;
//Allow for borders.
height2 = height - 25;
leftPosition = (window.screen.width / 2) - ((width / 2) - 10);
//Allow for title and status bars.
topPosition = (window.screen.height / 2) - ((height / 2) + 25);
//Open the window.
window.open(url, "Window2", "status=no,height=" + height2 + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,addressbar=no,menubar=no,scrollbars=no,location=no,directories=no");
}
		
// search result to show student details on enter fee admission page.
function showUser1(str){ 
var textSearch=$('#query').val();
var section_id=$('#section').val();
var class_id=$('#class').val();
if (textSearch=="")
{
document.getElementById("txtHint1").innerHTML="";
return;
}
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","inc/search-result1.php?q="+textSearch+"&class_id="+class_id+"&section_id="+section_id,true);
xmlhttp.send();
}

function showUser2(str){ 
var textSearch=$('#query').val();
var section_id=$('#section').val();
var class_id=$('#class').val();
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","inc/search-result1.php?q="+textSearch+"&class_id="+class_id+"&section_id="+section_id,true);
xmlhttp.send();
}

// update student basic details view-student.php
$('#basic-details').submit(function(event) {
event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-basic',
                        data: $(this).serialize(),
						//dataType: 'json',
                        success: function (data) {
                                //console.log(data);
                                $('#message').html(data);
                        }
                });

        });

// update student details (fee)
$('#updatefee').submit(function(event) {
event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-fee',
                        data: $(this).serialize(),
						//dataType: 'json',
                        success: function (data) {
                                //console.log(data);
                                $('#message').html(data);
                        }
                });

        });

// view-student.php visibility update (id method)
$('#update-visibility').submit(function(event) {
                event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-option',
                        data: $(this).serialize(),
                        //dataType: 'json',
                        success: function (data) {
                                console.log(data);
                                $('#message').html(data);
						//		location.reload();
						},
		        });
        });
		
// list-student.php & list-cancel.php & list-nso.php visibility update (class method)
$('.update-visibility').submit(function(event) {
                event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-option',
                        data: $(this).serialize(),
                        //dataType: 'json',
                        success: function (data) {
                                console.log(data);
                                $('#message').html(data);
						//		location.reload();
						},
		        });
        });		

// view-student.php transport update
$('#update-transport').submit(function(event) {
                event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-transport',
                        data: $(this).serialize(),
                        //dataType: 'json',
                        success: function (data) {
                                console.log(data);
                                $('#message').html(data);
						//		location.reload();
						},
		        });
        });

// view-student.php certificate update
$('#update-certificate').submit(function(event) {
                event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-certificate',
                        data: $(this).serialize(),
                        //dataType: 'json',
                        success: function (data) {
                                console.log(data);
                                $('#message').html(data);
						//		location.reload();
						},
		        });
        });
		

//function to search inside table
function doSearch() {
    var searchText = document.getElementById('searchTerm').value;
    var targetTable = document.getElementById('testTable');
    var targetTableColCount;
            
    //Loop through table rows
    for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
        var rowData = '';
        
        //Get column count from header row
        if (rowIndex == 0) {
           targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
           continue; //do not execute further code for header row.
        }
                
        //Process data rows. (rowIndex >= 1)
        for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
            rowData += targetTable.rows.item(rowIndex).cells.item(colIndex).textContent.toLowerCase();
        }

        //If search term is not found in row data
        //then hide the row, else show
        if (rowData.indexOf(searchText) == -1)
            targetTable.rows.item(rowIndex).style.display = 'none';
        else
            targetTable.rows.item(rowIndex).style.display = 'table-row';
    }
}

// fetching student information
$('.stu_name_hover_details').each(function() {
var status_id = $(this).attr('href').split('=');
var adm_no = { "adm_no" : status_id[1] };
$(this).qtip({
   content: {
     text: '<img src="img/update.gif" alt="Loading..."/>', // The text to use whilst the AJAX request is loading
        ajax: {
            url: 'inc/get-student-info', // URL to the local file
            type: 'GET', // POST or GET
            data: adm_no// Data to pass along with your request
        }
	},
	position: {
        at: $('#at').val(),
        my: $('#my').val(),
        viewport: $(window),
        adjust: {
            screen: true
        }
    },
		style: {
        classes: 'qtip-light',
        classes: 'qtip-shadow',
        width: 500, // Overrides width set by CSS (but no max-width!)
        height: 200 // Overrides height set by CSS (but no max-height!)
    }
	

});
});

// transport-report-bus-edit.php bus update
$('.update-bus').submit(function(event) {
                event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-bus',
                        data: $(this).serialize(),
                        //dataType: 'json',
                        success: function (data) {
                                console.log(data);
                                $('#message').html(data);
						//		location.reload();
						},
		        });
        });

// update emp visibility
$('#update-status-emp').submit(function(event) {
event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-staff-all',
                        data: $(this).serialize(),
						//dataType: 'json',
                        success: function (data) {
                                //console.log(data);
                                $('#message').html(data);
                        }
                });

        });
		
		// update emp details
$('#update_details_emp').submit(function(event) {
event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-staff-all',
                        data: $(this).serialize(),
						//dataType: 'json',
                        success: function (data) {
                                //console.log(data);
                                $('#message').html(data);
                        }
                });

        });

				// update emp salary
$('#update_salary_emp').submit(function(event) {
event.preventDefault();
                $.ajax({
                        type: 'POST',
                        url: 'inc/update-staff-all',
                        data: $(this).serialize(),
						//dataType: 'json',
                        success: function (data) {
                                //console.log(data);
                                $('#message').html(data);
                        }
                });

        });
		
		
		
		
		
function showUser11(str){ 
var textSearch=$('#query').val();
var section_id=$('#section').val();
var class_id=$('#class').val();
if (textSearch=="")
{
document.getElementById("txtHint1").innerHTML="";
return;
}
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","inc/search-result-sibling.php?q="+textSearch+"&class_id="+class_id+"&section_id="+section_id,true);
xmlhttp.send();
}

function showUser22(str){ 
var textSearch=$('#query').val();
var section_id=$('#section').val();
var class_id=$('#class').val();
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","inc/search-result-sibling.php?q="+textSearch+"&class_id="+class_id+"&section_id="+section_id,true);
xmlhttp.send();
}


//Function For Creating Sibling here
function createSibling(){
	var siblingArr=[];
	$(".siblings").each(function(){
		if($(this).attr('checked')){
			siblingArr.push($(this).val());
		}
	});
	$.ajax({
			type: 'POST',
			url: 'inc/create-sibling',
			data:{data:siblingArr},
			//dataType: 'json',
			success: function (data) {
					//console.log(data);
					$('#info').html(data);
					$('.siblings').attr('checked',false);
					showUser22('siblings');
					
			}
	});
}


//Function For Creating Sibling here
function removeSibling(adm_no){
	$.ajax({
			type: 'POST',
			url: 'inc/remove-sibling',
			data:{data:adm_no},
			//dataType: 'json',
			success: function (data) {
					//console.log(data);
					$('#info').html(data);
					$('.siblings').attr('checked',false);
					showUser22('siblings');
			}
	});
}

