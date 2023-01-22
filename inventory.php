<!DOCTYPE html>
<html>
  <head>
    <?php include_once 'header.php';?>
  </head>
  <body onload="getItems()">
    <div style="display: flex; justify-content: space-around;">
      <div>
        <a href="inventory.php" style="text-decoration: none; color: black">
        <h1 class="LogoHeading">Estore</h1>
        </a>
      </div>
      <div style="display: flex;">
       <div>
          <p style="margin-top: 30%;" id="userName">
            Hello, 
          </p>
        </div>
        <div>
          <button type="submit" class="btn btn-danger" onclick="Logout();" style="margin-top: 30%; margin-left: 15px;">
            Logout
          </button>
        </div>
      </div>
    </div>
    <hr />
    <div style="display: flex;">
      <div class="col" style="padding: 20px;">
          <h3 class="center" style="margin-bottom: 1%">Create Product Recipt</h3>
          <div class="mb-3">
            <label for="prodName" class="form-label">Product Name</label>
            <br>
            <select id="prodName" onchange="getQTY()" style="width: 100%; padding: 10px; border-radius: 5px;">
                <option value=""></option>
            </select>
          </div>
           <div class="mb-2">
            <label for="Price" class="form-label">Product Price</label>
            <input
              type="number"
              class="form-control"
              id="Price"
              disabled
            />
          </div>
          <div class="mb-3">
            <label for="PQty" class="form-label">Product Quantity</label>
            <input
              type="number"
              class="form-control"
              id="PQty"
              min = "1"
              value = "1"
            />
          </div>
          
          <div class="center">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CartModal" onclick="generateInvoice()">
              Purchase It
            </button>
          </div>
      </div>


      <div id="manageProduct" class="col">
        <h2 id="manageUserHead">Manage Store</h2>
        <button class="btn btn-outline-success" id="newItem" onclick='location.href="AddItem.php"'>
          Add New Item
        </button><br>
        <button class="btn btn-outline-primary" id="viewItem" onclick='location.href="viewItem.php"'>
          Veiw All Items
        </button><br>
        <button class="btn btn-outline-danger" id="delItem" onclick='location.href="delItem.php"'>
          Delete Item
        </button><br>
      </div>
    </div>
    

    <!-- Modal -->
      <div class="modal fade" id="CartModal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 100%">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Invoice</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table" id="modalInvoice">
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" id="modalDoneBtn" onclick="clearModal()" class="btn btn-success" data-bs-dismiss="modal">Done!</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php include_once 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var user = JSON.parse(sessionStorage.getItem('user'));
      if (user == null)
      {
        window.location.href = "login.php"
      }
      document.getElementById('userName').innerHTML += user['name'];

     function generateInvoice()
     {
      var product = document.getElementById('prodName').value;
      var qty = document.getElementById('PQty').value;
      var price = document.getElementById('Price').value;
      var data = "";
      if(product == "")
      {
        document.getElementById('modalInvoice').innerHTML  = "Choose Any Product First!";
        document.getElementById('modalDoneBtn').style.display = "none";
      }
      else {
        document.getElementById('modalDoneBtn').style.display = "block";
        data +='<tr><th>Product Name</th><th>Product Quantity</th>';
        data += '<th>Product Price</th><th>Total Price</th></tr>';
        data += '<tr><td id="tableProduct">'+product+'</td>';
        data += '<td id="tableProductQTY">'+qty+'</td>';
        data += '<td>'+price+'</td>';
        data += '<td>'+qty*price+'</td></tr>';
        document.getElementById('modalInvoice').innerHTML  = data;
      }
     }

     function clearModal()
     {
      var product = document.getElementById("tableProduct").innerHTML;
      var qty = document.getElementById("tableProductQTY").innerHTML;
      $.post("controller.php", {
          product : product,
          qty: qty,
          user : user['id'],
          action : 'invoice',
          
        }, function() {
          document.getElementById('modalInvoice').innerHTML = "";
          location.reload();
        });
     }
    </script>
   </body>
</html>