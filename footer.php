  <div>
    <hr>
    <p style="display: flex; justify-content: center;">Estore &copy;2022</p>
  <div>
  <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
  <script type="text/javascript">

       function addUser() {
        var name = document.getElementById("FullName").value;
        var email = document.getElementById("Email").value;
        var password = document.getElementById("Password").value;
        if(name == "" || email == "" || password == "")
        {
          alert('Add All Fields');
          return;
        }
        $.post("controller.php", {
            name : name,
            email: email,
            password: password,
            
            action: "addUser",
          },
          function (result) { 
            if(jQuery.parseJSON(result) === "Error!")
            {
              alert("user already exists!");
              return;
            }
            window.sessionStorage.setItem('user', jQuery.parseJSON(result));
            location.href="inventory.php";
          }
        );
      }

      function LoginUser() {
        var email = document.getElementById("Email").value;
        var password = document.getElementById("Password").value;
        if(email == "" || password == "")
        {
          alert('Add All Fields');
          return;
        }
        $.post(
          "controller.php",
          {
            email: email,
            password: password,

            action: "LoginUser",
          },
          function (result) {
            var fres = jQuery.parseJSON(result);
            if(fres['userID'] > 0)
            {
              window.sessionStorage.setItem('user', JSON.stringify({"id" : fres['userID'][0],"name" : fres['userName'][0],"email" : fres['userEmail'][0], "isAdmin":fres['isAdmin'][0]}));
              if(fres['isAdmin'] == 1)
                location.href="admin.php";
              else
                location.href="inventory.php";
            }
            else
            {
              alert("Wrong Credentials");
            }
          });
        }

      function viewUsers()
      {
        $.post("controller.php", {
          action : 'getUsers'
          
        }, function(result) {
          var fres = jQuery.parseJSON(result);
          var table_format = '<table class="table table-hover">';
          table_format+= '<tr>';
          table_format+= '<th>User Id</th>';
          table_format+= '<th>User Name</th>';
          table_format+= '<th>User Email</th>';
          table_format+= '</tr>';
          for (var i = 0; i < fres['userID'].length; i++) {
            table_format+= '<tr>';
            table_format+= '<td>'+fres["userID"][i]+'</td>';
            table_format+= '<td>'+fres["userName"][i]+'</td>';
            table_format+= '<td>'+fres["userEmail"][i]+'</td>';
            table_format+= '</tr>';	
          }
          table_format+= "</table>";
          document.getElementById("myid").innerHTML += table_format;

        });
        
      }

      function viewItems()
      {
        $.post("controller.php", {
          user : user['id'],
          action : 'getItems'
          
        }, function(result) {
          var fres = jQuery.parseJSON(result);
          var table_format = '<table class="table table-hover">';
          table_format+= '<tr>';
          table_format+= '<th>Product Name</th>';
          table_format+= '<th>Product Quantity</th>';
          table_format+= '<th>Product Price</th>';
          table_format+= '</tr>';
          for (var i = 0; i < fres['productID'].length; i++) {
            table_format+= '<tr>';
            table_format+= '<td>'+fres["productName"][i]+'</td>';
            table_format+= '<td>'+fres["productQTY"][i]+'</td>';
            table_format+= '<td>'+fres["productPrice"][i]+'</td>';
            table_format+= '</tr>';	
          }
          table_format+= "</table>";
          document.getElementById("myid").innerHTML += table_format;

        });
        
      }

      function addItems() {
        var name = document.getElementById("PName").value;
        var desc = document.getElementById("PDesc").value;
        var qty = document.getElementById("PQty").value;
        var price = document.getElementById("Price").value;
        if(name == "" || desc == "" || qty == "" || price == "")
        {
          alert('Add All Fields');
          return;
        }
        $.post("controller.php", {
            pName : name,
            pDesc: desc,
            pQty: qty,
            price: price,
            user : user['id'],
            action: "addItems",
          },
          function (result) { 
            alert('Data Added')
            document.getElementById("PName").value = "";
            document.getElementById("PDesc").value = "";
            document.getElementById("PQty").value = "";
            document.getElementById("Price").value = "";
          }
        );
      }

      function Logout()
      {
        window.sessionStorage.clear();
        location.href="index.php";
      } 

    function getUserCount()
    {
       $.post("controller.php", {
            action: "getUserCount",
          },
          function (result) { 
            var count = jQuery.parseJSON(result);
           document.getElementById('userCount').innerHTML = count["Count"];
          }
        );
    }
    
    function getUserName()
      {
        $.post("controller.php", {
          action : 'getUserName'
          
        }, function(result) {
          var fres = jQuery.parseJSON(result);
          var option_format = '<table class="table table-hover">';
          for (var i = 0; i < fres['userName'].length; i++) {
            option_format+= '<option value="'+fres["userName"][i]+'">'+fres["userName"][i]+'</option>';
          }
          document.getElementById("Users").innerHTML += option_format;

        });
        
      }

      function deleteUser()
      {
        var name = document.getElementById('Users').value;
        $.post("controller.php", {
          userName: name,
          action : 'deleteUser'
          
        }, function() {
            location.href="Admin.php";
        });
        
      }

      function updateUserInfo()
      {
        var name = document.getElementById('Users').value;
        var role = document.getElementById('userRole').value;
        if(role == "" || name == "")
        {
          alert("select all feilds");
          return;
        }
        $.post("controller.php", {
          userName: name,
          role: role,
          action : 'updateUserInfo'
          
        }, function() {
            var user = JSON.parse(sessionStorage.getItem('user'));
            user['isAdmin'] = role;
            sessionStorage.setItem('user', JSON.stringify(user));
            location.href="Admin.php";
        });
      }

      function getItems()
      {
        $.post("controller.php", {
          user : user['id'],
          action : 'getItems'
          
        }, function(result) {
          var fres = jQuery.parseJSON(result);
          sessionStorage.setItem('store', JSON.stringify(fres));
          var select_format = "";
          for (var i = 0; i < fres['productID'].length; i++) {
            if(fres["productQTY"][i] > 0)
              select_format+= '<option>'+fres["productName"][i]+'</option>';
          }
          document.getElementById("prodName").innerHTML += select_format;
        });
        
      }

      function getQTY()
      {
        var productName = document.getElementById('prodName').value;
        var productList = JSON.parse(sessionStorage.getItem('store'));
        for (var i = 0; i < productList['productID'].length; i++) {
            if(productList["productName"][i] == productName && productList["productQTY"][i] > 0)
            {
              document.getElementById("PQty").max = productList["productQTY"][i];
              document.getElementById("Price").value = productList["productPrice"][i];
            }
          }
      }

      function getItemsForDel()
      {
        $.post("controller.php", {
          user : user['id'],
          action : 'getItems'
          
        }, function(result) {
          var fres = jQuery.parseJSON(result);
          sessionStorage.setItem('store', JSON.stringify(fres));
          var select_format = "";
          for (var i = 0; i < fres['productID'].length; i++) {
            select_format+= '<option>'+fres["productName"][i]+'</option>';
          }
          document.getElementById("prodName").innerHTML += select_format;
        });
        
      }

    </script>
  

