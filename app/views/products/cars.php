<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
   
 <style>
  
 .anh_mota {
    width: 60px;
    height: 60px;
    object-fit: contain;
}
 table {
    border-collapse: collapse; /* Gộp viền */
    /* width: 100%; */
  }

  table, th, td {
    border: 1px solid black;
    font-size: 20px;
    margin:100px;
  }

  th, td {
    padding: 8px;
    text-align: left;
  }
  input{
    font-size: 20px;
  }

  .div_thanhtoan{
    width:100%;
    font: size 40px; ;
    display:flex;
    justify-content: center;
    background-color: rgb(246, 115, 92);
    align-items: center;
    position: fixed;
bottom: 10px;
/* right: 10px; */

  }
  .div_thanhtoan input{
     height: 30px;
     margin-left: 50px;
  }
 </style>
</head>
<body>

   <div class="main_cars">
    <form>
    <table>
        <tr>
            <th>Chọn</th>
            <th>Hình ảnh</th>
            <th> Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Xoá</th>
        </tr>
        <tr id="main_cars_stt1">
            <td><input style="width: 20px;height:20px;" class="chon_sanpham" type="checkbox"></td>
            <td> <img class="anh_mota" src="thongbao.jpg" alt="thông báo"></td>
            <td>Chan nước năm</td>
            <td><input type="button" class="giam_soluong" value="-">
                <input style="width: 70px;" readonly class="soluong_sanpham"type="number" value="1">
                <input type="button" class="tang_soluong" value="+">
            </td>
            <td  data-gia="200" class="gia">200$</td>
            <td><input type="button" class="xoa_khoigiohang" value="Xoá"></td>
        </tr>
        <tr id="stt2">
            <td><input style="width: 20px;height:20px;" class="chon_sanpham" type="checkbox"></td>
            <td> <img class="anh_mota" src="thongbao.jpg" alt="thông báo"></td>
            <td>Chan nước năm</td>
            <td><input type="button" class="giam_soluong" value="-">
                <input style="width: 70px;" readonly class="soluong_sanpham" type="number" value="1">
                <input type="button" class="tang_soluong" value="+">
            </td>
            <td data-gia="200" class="gia">200$</td>
            <td><input type="button" class="xoa_khoigiohang" value="Xoá"></td>
        </tr>
        <tr id="stt3">
            <td><input style="width: 20px;height:20px;" class="chon_sanpham"  type="checkbox"></td>
            <td> <img class="anh_mota" src="thongbao.jpg" alt="thông báo"></td>
            <td>Chan nước năm</td>
            <td><input type="button" class="giam_soluong" value="-">
                <input style="width: 70px;"readonly class="soluong_sanpham" type="number" value="1">
                <input type="button" class="tang_soluong" value="+">
            </td>
            <td data-gia="200" class="gia">200$</td>
            <td><input type="button" class="xoa_khoigiohang" value="Xoá"></td>

        </tr>

    </table>
    </form>
    <div class="div_thanhtoan">
        <p style="font-size: 30px;"> Thành tiền: <span class="thanh_tien"></span></p>
        <!-- <p class="thanh_tien"></p> -->
          <input id="thanhtoan" type="button" value="Thanh toán" >
    </div>
    <script>
        const b_xoa=document.querySelectorAll(".xoa_khoigiohang"); //button xoá sản phẩm ra khỏi chi tiết
          const tang_soluong=document.querySelectorAll(".tang_soluong"); //button xoá sản phẩm ra khỏi chi tiết
            const giam_soluong=document.querySelectorAll(".giam_soluong"); //button xoá sản phẩm ra khỏi chi tiết


// tăng sản phầm
tang_soluong.forEach(function(tang) {
  tang.addEventListener("click", function() {
    const par_tang = tang.closest("td");
    const sl_hienthi = par_tang.querySelector(".soluong_sanpham");

    // Tăng giá trị hiện tại lên 1
    sl_hienthi.value = parseInt(sl_hienthi.value) + 1;
    capnhatthanhtien()
  });
});

// xoá sản phâm khỏi chi tiết
giam_soluong.forEach(function(giam) {
  giam.addEventListener("click", function() {
    const par_giam = giam.closest("td");
    const sl_hienthi = par_giam.querySelector(".soluong_sanpham");
    if(sl_hienthi.value<=1)
  {
    return;
  }

    // Tăng giá trị hiện tại lên 1
    sl_hienthi.value = parseInt(sl_hienthi.value) -1;
    capnhatthanhtien();
  });
});



// xoá các sản phẩm ra khỏi giỏ hàng
b_xoa.forEach(function(but) {
  but.addEventListener("click", function() {
    // alert("Bạn vừa nhấn nút xoá");
     let par_but=but.closest("tr"); 
      par_but.remove();
      capnhatthanhtien();

  });
});
// cập nhật thành tiền
const chon_sanphamex = document.querySelectorAll(".chon_sanpham"); 

chon_sanphamex.forEach(function(chon) {
  chon.addEventListener("click", function() {
   
  capnhatthanhtien();
  });
});

function capnhatthanhtien(){
    const chon_sanpham = document.querySelectorAll(".chon_sanpham"); 

     let thanhtien = 0; // reset lại thành tiền mỗi lần click

    chon_sanpham.forEach(function(item) {
      if (item.checked) {
        let par_tr = item.closest("tr"); 
        const soluong = par_tr.querySelector(".soluong_sanpham");
        const gia = par_tr.querySelector(".gia");

        // Lấy giá từ data-gia
        const don_gia = Number(gia.dataset.gia);
        const so_luong = Number(soluong.value);

        thanhtien += so_luong * don_gia;
      }
    });

    // Cập nhật vào phần hiển thị
    const thanhTienElement = document.querySelector(".thanh_tien");
    if (thanhTienElement) {
      thanhTienElement.innerHTML = thanhtien.toLocaleString() + "     vnd       ";
    }

 const thanhtoan =document.getElementById("thanhtoan");

     if (thanhtien>0)
    {

//  thanhtoan.setAttribute("backgroung_coler", "red");
 thanhtoan.style.backgroundColor = "red";
 thanhtoan.disabled = false;
 
    }
    else{
     
thanhtoan.style.backgroundColor = "white"; // ✅ Đúng màu (not "with")
thanhtoan.setAttribute("disabled", "true");
    }



}


 
    </script>


   </div>
</body>
</html>