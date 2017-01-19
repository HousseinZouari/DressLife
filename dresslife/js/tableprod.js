	//declaration
 var url_addprod="formprod.php";
 var items = $(".rows");
 var hashPageNum = 5;
 var perPage = 5;
 var numItems = items.length;
 // pagination for table

                                    
                                    items.hide().slice(0, hashPageNum).show();
                                  
                                    // now setup pagination
                                    $("#pag").pagination({
                                        items: numItems,
                                        itemsOnPage: perPage,
                                        onPageClick: function (pageNumber) {
                                            var showFrom = perPage * (pageNumber - 1);
                                            var showTo = showFrom + perPage;
                                            items.hide() // first hide everything, then show for the new page
                                                    .slice(showFrom, showTo).show();

                                        }
                                    });
// redirect to addproduct
function redirect_to(){
	
	window.location=url_addprod;
}