<form action="{{route('store_product')}}" method="POST">
    {{csrf_field()}}

<label for="select_type_product">Choose a product:</label>

<select name="product_type" id="select_type_product">


    <option value="CC">CC</option>
    <option value="LOG">Account</option>
    <option value="DOC">Documents</option>
    <option value="MAIL_LIST">Mails list</option>
    <option value="HOST">Hosting</option>
    <option value="SMTP">SMTP</option>
    <option value="TOOL">Other Tool</option>
</select>
    <br>
    <label for="details_product">Details of product :</label>
    <br>
    <textarea id="details_product" name="product_content"
              rows="5" cols="33">
Blabla...
</textarea>
    <br>
<button type="submit">Mettre en vente</button>

</form>
