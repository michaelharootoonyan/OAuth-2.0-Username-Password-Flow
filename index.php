<form class="form-horizontal" method="POST" action="./sds-rest-end-point.php">
   <fieldset>
      <legend></legend>
      <div class="form-group">
         <div class="col-md-4"> <input id="street" class="form-control input-md" name="street" required="" type="text" placeholder="Street"> </div>
      </div>
      <div class="form-group">
         <div class="col-md-4"> <input id="city" class="form-control input-md" name="city" required="" type="text" placeholder="City"> </div>
      </div>
      <div class="form-group">
         <div class="col-md-4">
            <select id="state" class="form-control" name="state" required="">
               <option value="">N/A</option>
               <option value="AK">Alaska</option>
               <option value="AL">Alabama</option>
               <option value="AR">Arkansas</option>
               <option value="AZ">Arizona</option>
               <option value="CA">California</option>
               <option value="CO">Colorado</option>
               <option value="CT">Connecticut</option>
               <option value="DC">District of Columbia</option>
               <option value="DE">Delaware</option>
               <option value="FL">Florida</option>
               <option value="GA">Georgia</option>
               <option value="HI">Hawaii</option>
               <option value="IA">Iowa</option>
               <option value="ID">Idaho</option>
               <option value="IL">Illinois</option>
               <option value="IN">Indiana</option>
               <option value="KS">Kansas</option>
               <option value="KY">Kentucky</option>
               <option value="LA">Louisiana</option>
               <option value="MA">Massachusetts</option>
               <option value="MD">Maryland</option>
               <option value="ME">Maine</option>
               <option value="MI">Michigan</option>
               <option value="MN">Minnesota</option>
               <option value="MO">Missouri</option>
               <option value="MS">Mississippi</option>
               <option value="MT">Montana</option>
               <option value="NC">North Carolina</option>
               <option value="ND">North Dakota</option>
               <option value="NE">Nebraska</option>
               <option value="NH">New Hampshire</option>
               <option value="NJ">New Jersey</option>
               <option value="NM">New Mexico</option>
               <option value="NV">Nevada</option>
               <option value="NY">New York</option>
               <option value="OH">Ohio</option>
               <option value="OK">Oklahoma</option>
               <option value="OR">Oregon</option>
               <option value="PA">Pennsylvania</option>
               <option value="PR">Puerto Rico</option>
               <option value="RI">Rhode Island</option>
               <option value="SC">South Carolina</option>
               <option value="SD">South Dakota</option>
               <option value="TN">Tennessee</option>
               <option value="TX">Texas</option>
               <option value="UT">Utah</option>
               <option value="VA">Virginia</option>
               <option value="VT">Vermont</option>
               <option value="WA">Washington</option>
               <option value="WI">Wisconsin</option>
               <option value="WV">West Virginia</option>
               <option value="WY">Wyoming</option>
            </select>
         </div>
      </div>
      <div class="form-group">
         <div class="col-md-4"> <input id="postalCode" class="form-control input-md" name="postalCode" required="" type="text" placeholder="Zip Code" pattern="[0-9]{5}" title="Five digit zip code"> </div>
      </div>
      <div class="form-group">
         <div class="col-md-4"> <label class="checkbox-inline" for="homeOwner"> <input type="checkbox" name="checkboxes" id="homeOwner" value="yes" required=""> I own my home </label> </div>
      </div>
      <button class="btn btn-success" type="submit">Submit</button> 
   </fieldset>
</form>