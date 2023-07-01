<div class="container mt-5">
    <h1 class="text-center text-success">Edit Product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        
         
    

         <div class="form-outine w-50 m-auto p-2">
            <label for="product_desce" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control" required="required">
         </div>

         <div class="form-outine w-50 m-auto p-2">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required">
         </div>

         <div class="form-outine w-50 m-auto p-2">
         <label for="Product_categories" class="form-label">Product Categories</label>
            <select name="Product_categories" class="form-select">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">2</option>
                <option value="">4</option>
                <option value="">5</option>
            </select>
          </div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="Product_categories" class="form-label">Product Categories</label>
            <select name="Product_categories" class="form-select">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">2</option>
                <option value="">4</option>
                <option value="">5</option>
            </select>
             </div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="product_image1" class="form-label">Product Image1</label> 
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control" required="required">
            <img src="../Images/cooker1.png" class="product_image" alt="">
            </div> 
</div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="product_image2" class="form-label">Product Image2</label> 
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control" required="required">
            <img src="../Images/cooker2.png" class="product_image" alt="">
            </div> 
</div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="product_image3" class="form-label">Product Image3</label> 
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control" required="required">
            <img src="../Images/cooker1.png" class="product_image" alt="">
            </div> 
</div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required">
         </div>


         <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product" class="bg-primary p-2 mb-3 rounded text-light" >
         </div>
    </form>
</div>