<h2 text-align:center>Massage</h2>
<p></p>

<div class="container">
  <form action="FormSub.php">

  <input type="hidden" id="content" name='.$content.' >
   
    <div class="row">
      <div class="col-25">
        <label for="country">Country</label>
      </div>
      <div class="col-75">
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Subject</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="p_msg" placeholder="Write about your disease.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit"  value="Submit">
    </div>
  </form>
</div>';




<form action="FormSub.php" method="post">
    <select name="Fruit">
        <option value="" disabled selected>Choose option</option>
        <option value="Apple">Apple</option>
        <option value="Banana">Banana</option>
        <option value="Coconut">Coconut</option>
        <option value="Blueberry">Blueberry</option>
        <option value="Strawberry">Strawberry</option>
    </select>
    <input type="submit" name="submit" vlaue="Choose options">
</form>