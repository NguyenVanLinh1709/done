<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="deleteAdminStyle.css">
    <title>Delete Tasty Food</title>
</head>

<body>
    <?php include 'connect.php'; ?>
    <?php
    ob_start();
    $getKey = $_GET['MaMonAn'];

    // Query hiển thị thông tin khách hàng
    $sql = "SELECT * FROM mon_an WHERE MaMonAn='$getKey'";
    ?>

    <div class="container-header">
        <a href="http://localhost:8080/learnphp/Internship_TastyFood/index.php"><img class=" logo" src="logo.png" alt="Hình ảnh logo"></a>
        <h1 class="banner-title">Xoá địa điểm ẩm thực</h1>
    </div>

    <hr>


    <div class="container-main">
        <form method="POST" enctype="multipart/form-data">
            <?php
            $queryMonAn = mysqli_query($conn, $sql);
            $rowMonAn = mysqli_fetch_array($queryMonAn);
            $mamonan = $rowMonAn['MaMonAn'];
            $tenmonan = $rowMonAn['TenMonAn'];
            $diachi = $rowMonAn['DiaChi'];
            $gia = $rowMonAn['Gia'];
            $sodienthoai = $rowMonAn['SoDienThoai'];
            $danhgia = $rowMonAn['DanhGia'];
            $hinhanh = $rowMonAn['HinhAnh'];
            $mota = $rowMonAn['MoTa'];
            $danhmuc = $rowMonAn['MaDanhMuc'];
            $amthuc = $rowMonAn['MaAmThuc'];
            $xaphuong = $rowMonAn['MaPhuong'];
            ?>
            <div class="form-group row">
                <label for="inputmamonan" class="col-sm-2 col-form-label">Mã món ăn</label>
                <div class="col-sm-10">
                    <input type="text" name="mamonan" class="form-control" disabled id="inputmamonan" value="<?php echo $mamonan ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputtenmonan" class="col-sm-2 col-form-label">Tên món ăn</label>
                <div class="col-sm-10">
                    <input type="text" name="tenmonan" class="form-control" disabled id="inputtenmonan" value="<?php echo $tenmonan ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputdiachi" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" name="diachi" class="form-control" disabled id="inputdiachi" value="<?php echo $diachi ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputgia" class="col-sm-2 col-form-label">Giá</label>
                <div class="col-sm-10">
                    <input type="text" name="gia" class="form-control" disabled id="inputgia" value="<?php echo $gia ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputsodienthoai" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="tel" name="sdt" class="form-control" disabled id="inputsodienthoai" value="<?php echo $sodienthoai ?>">
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Đánh giá</legend>
                    <input type="radio" name="gender" disabled value="1" <?php if ($danhgia == 1) echo "checked" ?>> 1 Sao
                    <input type="radio" name="gender" disabled value="2" <?php if ($danhgia == 2) echo "checked" ?>> 2 Sao
                    <input type="radio" name="gender" disabled value="3" <?php if ($danhgia == 3) echo "checked" ?>> 3 Sao
                    <input type="radio" name="gender" disabled value="4" <?php if ($danhgia == 4) echo "checked" ?>> 4 Sao
                    <input type="radio" name="gender" disabled value="5" <?php if ($danhgia == 5) echo "checked" ?>> 5 Sao
                </div>
            </fieldset>

            <div class="form-group custom-control-inline">
                <?php
                echo "<img src='./image/" . $hinhanh . "' style='width: 300px; height: auto;'";
                echo "<br>";
                ?>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mô tả</label>
                <div class="col-sm-10">
                    <input type="textarea" name="mota" class="form-control" disabled id="inputmota" value="<?php echo $mota ?>">
                </div>
            </div>

            <div class="container-search">
                <select class="custom-select" name="danhmuc" disabled>
                    <?php
                    $sql = "SELECT * FROM danh_muc";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) != 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value=" . $row[0] . " " . ($danhmuc == $row[0] ? 'selected' : '') . ">" . $row[1] . "</option>";
                        }
                    }
                    ?>
                </select>
                <select class="custom-select" name="amthuc" disabled>
                    <?php
                    $sql = "SELECT * FROM am_thuc";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) != 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value=" . $row[0] . " " . ($amthuc == $row[0] ? 'selected' : '') . ">" . $row[1] . "</option>";
                        }
                    }
                    ?>
                </select>
                <select class="custom-select" name="xaphuong" disabled>
                    <?php
                    $sql = "SELECT * FROM xa_phuong";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) != 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value=" . $row[0] . " " . ($xaphuong == $row[0] ? 'selected' : '') . ">" . $row[1] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group row custom-control-inline">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-warning">Xoá</button>
                </div>
            </div>

            <div class="form-group row custom-control-inline">
                <div class="col-sm-10">
                    <a href="http://localhost:8080/learnphp/Internship_TastyFood/admin.php"><button type="button" class="btn btn-warning">Huỷ</button></a>
                </div>
            </div>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tenmonan = $_POST['tenmonan'];
                $diachi = $_POST['diachi'];
                $gia = $_POST['gia'];
                $sodienthoai = $_POST['sodienthoai'];
                $danhgia = $_POST['danhgia'];
                $hinhanh = $_POST['hinhanh'];
                $mota = $_POST['mota'];
                $danhmuc = $_POST['danhmuc'];
                $amthuc = $_POST['amthuc'];
                $xaphuong = $_POST['xaphuong'];
                // Query xóa thông tin khách hàng
                $sqlDelete = "DELETE FROM mon_an WHERE MaMonAn='$getKey'";
                $qrDelete = mysqli_query($conn, $sqlDelete);
                // Kiểm tra thông báo cập nhập
                if ($qrDelete) {
                    header("Location: http://localhost:8080/learnphp/Internship_TastyFood/admin.php");
                } else {
                    echo "error" . mysqli_error($conn);
                }
            }
            ?>
        </form>
    </div>
    <?php
    mysqli_close($conn);
    ?>

    <hr>

    <div class="container-footer">
        <!-- Footer -->
        <footer class="page-footer font-small mdb-color pt-4">
            <!-- Footer Links -->
            <div class="container text-center text-md-left">
                <!-- Footer links -->
                <div class="row text-center text-md-left mt-3 pb-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">TastyFood</h6>
                        <p>Giúp việc lựa chọn món ăn của bạn trở nên một cách dễ dàng và tiện lợi hơn,
                            phù hợp với tất cả sở thích từ những người dễ đến những người khó tính nhất.
                        </p>
                    </div>
                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none">
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Một số trang Web khác</h6>
                        <p>
                            <a href="https://www.foody.vn/" target="_blank">Foody.vn</a>
                        </p>
                        <p>
                            <a href="https://www.now.vn/" target="_blank">Now.vn</a>
                        </p>
                        <p>
                            <a href="http://matsuya.vn/" target="_blank">Matsuya.vn</a>
                        </p>
                        <p>
                            <a href="https://lozi.vn/" target="_blank">Lozi.vn</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Chia sẻ cho bạn bè</h6>
                        <p>
                            <a href="https://www.facebook.com/" target="_blank">Facebook</a>
                        </p>
                        <p>
                            <a href="https://www.instagram.com/" target="_blank">Instagram</a>
                        </p>
                        <p>
                            <a href="https://twitter.com/" target="_blank">Twitter</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none">
                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Thông tin liên hệ</h6>
                        <p>
                            <i class="fas fa-home mr-3"></i>Tp.Nha Trang, Khánh Hoà</p>
                        <p>
                            <i class="fas fa-envelope mr-3"></i>vanlinh.58th1@gmail.com</p>
                        <p>
                            <i class="fas fa-phone mr-3"></i>0935831360</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Footer links -->
                <hr>
                <!-- Grid row -->
                <div class="row d-flex align-items-center">

                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8">

                        <!--Copyright-->
                        <p class="text-center text-md-left">© 2020 Copyright:
                            <a href="https://www.foody.vn/" target="_blank">
                                <strong>Foody.com</strong>
                            </a>
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0">
                        <!-- Social buttons -->
                        <div class="text-center text-md-right">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            <!-- Footer Links -->
        </footer>
        <!-- Footer -->
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>