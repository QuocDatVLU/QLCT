console.log('connected');
$(document).ready(function(){
 getProducts();
 getNews();
}) //End document ready 
 
function getProducts(){
 $.ajax({
  url: 'getProducts.php',
  method: 'POST',
  dataType: 'json',
  // data: 
 }).done(function(data){
  console.log(data);
  if(data.result){
   var rows = "";
   $.each(data.products, function(index, product){
    // console.log(index+" - "+product.product_name);
    rows += "<div class='col-lg-4 col-md-6 mb-4'>";
    rows += " <div class='card h-100'>";
    rows += "   <a href='productdetail.php?id="+product.id+"' ><img class='card-img-top' src='"+product.image+"' alt=''></a>";
    rows += "   <div class='card-body'>";
    rows += "   <h4 class='card-title'>";
    rows += "     <a href='#'>"+product.product_name+"</a>";
    rows += "     </h4>";
    rows += "     <h5>"+product.price+"</h5>";
    rows += "     <p class='card-text'>"+product.description+"</p>";
    rows += "   </div>";
    rows += "   <div class='card-footer'>";
    rows += "     <small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
    rows += "   </div>";
    rows += " </div>";
    rows += "</div>";
   })
   $("#product-list").html(rows);
  }
 }).fail(function(jqXHR, statusText, errorThrown){
  console.log("Fail:"+ jqXHR.responseText);
  console.log(errorThrown);
 }).always(function(){
 
 })
}
// function getNews(){
//  $.ajax({
//   url: 'getProducts.php',
//   method: 'POST',
//   dataType: 'json',
//   // data: 
//  }).done(function(data){
//   console.log(data);
//   if(data.result){
//    var rows = "";
//    $.each(data.products, function(index, product){
//     // console.log(index+" - "+product.product_name);
//     // rows += "<div class='col-lg-4 col-md-6 mb-4'>";
//     // rows += " <div class='card h-100'>";
//     // rows += "   <a href='#'><img class='card-img-top' src='"+product.image+"' alt=''></a>";
//     // rows += "   <div class='card-body'>";
//     // rows += "   <h4 class='card-title'>";
//     // rows += "     <a href='#'>"+product.product_name+"</a>";
//     // rows += "     </h4>";
//     // rows += "     <h5>"+product.cost+"</h5>";
//     // rows += "     <p class='card-text'>"+product.description+"</p>";
//     // rows += "   </div>";
//     // rows += "   <div class='card-footer'>";
//     // rows += "     <small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
//     // rows += "   </div>";
//     // rows += " </div>";
//     // rows += "<ul>";
//     rows += "<ul style='list-style-type: none;'>News";
//     rows += "<li>"+product.product_name+"</li>";
//     rows += "</ul>";
//    })
//    $("#product-new").html(rows);
//   }
//  }).fail(function(jqXHR, statusText, errorThrown){
//   console.log("Fail:"+ jqXHR.responseText);
//   console.log(errorThrown);
//  }).always(function(){
 
//  })
// }