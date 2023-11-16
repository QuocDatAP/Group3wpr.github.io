<?php get_header()?>

<form method="post" action="">
    <label for="product_id">ID Sản phẩm:</label>
    <input type="text" name="product_id" id="product_id">
    
    <label for="product_qty">Số lượng:</label>
    <input type="text" name="product_qty" id="product_qty">
    
    <!-- Thêm các trường khác cho thông tin đặt hàng, như địa chỉ giao hàng và thông tin thanh toán -->
    
    <input type="submit" value="Đặt hàng">
</form>

<?php get_footer()?>