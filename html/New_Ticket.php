<?php
session_start();
?>
<form class="container" method="post" action="#">
    <div class="goBackMakeTicket">
        <a href="#" class="goBack "><i class="fas fa-backward"></i></a>
    </div>
<div class="form-group informationDiv">
    

    <div class="customerInformation">
        <h3>Contact information</h3>
    <span>Full Name</span><input type="text" name="ticketFullName" value="<?php echo $_SESSION['name'];?>"  class="ticketFullName form-controll filled">
    <span>Email address</span><input value="<?php echo $_SESSION['email']; ?>" type="text" name="ticketEmail" class="ticketEmail form-controll filled" >
    <span>Home address</span><input type="text" name="ticketHaddress" class="form-controll ticketHaddress" >
</div>

    <div class="productInformation">
        <h3>Product information</h3>
       <span>Product category</span>
       <select name="ticketPCategory" class="form-controll ticketPCategory">
        <option value="Tv">Television</option>
        <option value="sWatch">Smart Watch</option>
        <option value="sPhone">Smart Phone</option>
        <option value="Tablet">Tablets</option>
        <option value="Notebook">Notebook</option>
        <option value="other">Other</option>
       </select>
       <span>Product Name</span>
       <input class="form-group form-controll ticketPName" name="ticketPName" type="text">
       <span>Warranty number</span><input class="form-group ticketWNumber" type="text">
    </div>

</div>
<div class="faultDiv">
    <span>Please choose a category!</span>
    <select name="ticketFCategory" class="form-controll ticketFCategory">
        <option value="factoryDef">Factory defective product</option>
        <option value="humanDef">Defective product due to humman error</option>
        <option value="mAccessory">Missing accessory</option>
        <option value="billingError">Billing error</option>
        <option value="Other">Other</option>
    </select>
    <span>Describe your problem</span>
    <textarea name="ticketMessage" class="form-group ticketMessage"></textarea>
    <input type="submit" id="SendTicket" class="btn btn-dark" value="Send Request" name="sendRequest"> 
</div>


</form>