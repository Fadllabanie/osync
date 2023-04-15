<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="form-group">
        <label for="exampleInputEmail1">درجة القدرات</label>
        <input type="number" name="x" class="form-control" id="x" aria-describedby="emailHelp"
            placeholder="درجة القدرات">
            <small id="emailHelp" class="form-text text-muted">من درجة القدرات ٪٤٠ </small>
        </div>
    <div class="form-group">
        <label for="exampleInputEmail1"> درجة التحصيلي</label>
        <input type="number" name="y" class="form-control" id="y" aria-describedby="emailHelp"
            placeholder="درجة التحصيلي">
        <small id="emailHelp" class="form-text text-muted">من درجة التحصيلي ٪٣٠ </small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">درجة الثانوية العامة</label>
        <input type="number" name="z" class="form-control" id="z" aria-describedby="emailHelp"
            placeholder="الثانوية العامة">
            <small id="emailHelp" class="form-text text-muted">من درجة الثانوية العامة ٪٣٠ </small>
        </div>
    <div class="form-group">
        <label for="exampleInputEmail1">النتيجه</label>
        <input type="number" name="gg" class="form-control" id="gg" disabled aria-describedby="emailHelp"
            placeholder="النتيجه">
    </div>
    <button type="button" class="btn btn-primary" onclick="culc()">حساب المدل</button>
<hr/>
<hr/>
<hr/>
 <div class="form-group">
        <label for="exampleInputEmail1">درجة القدرات</label>
        <input type="number" name="xx" class="form-control" id="xx" aria-describedby="emailHelp"
            placeholder="درجة القدرات">
            <small id="emailHelp" class="form-text text-muted">من درجة القدرات ٪٦٠ </small>
        </div>
    <div class="form-group">
        <label for="exampleInputEmail1"> درجة الثانوية</label>
        <input type="number" name="zz" class="form-control" id="zz" aria-describedby="emailHelp"
            placeholder="درجة التحصيلي">
        <small id="emailHelp" class="form-text text-muted">من درجة الثانوية العامة ٪٤٠ </small>
    </div>
   
    <div class="form-group">
        <label for="exampleInputEmail1">النتيجه</label>
        <input type="number" name="ggg" class="form-control" id="ggg" disabled aria-describedby="emailHelp"
            placeholder="النتيجه">
    </div>
    <button type="button" class="btn btn-primary" onclick="culc1()">حساب المدل</button>
    
    <script>
        function culc() {
            var x = document.getElementById("x").value;
            var x = x * 40 / 100
            var y = document.getElementById("y").value;
            var y = y * 30 / 100
            var z = document.getElementById("z").value;
            var z = z * 30 / 100
            var r = x + y +z ;
            document.getElementById("gg").value = r;
        }
    </script>
 <script>
        function culc1() {
            var x = document.getElementById("xx").value;
            var x = x * 60 / 100
         
            var z = document.getElementById("zz").value;
            var z = z * 40 / 100
            var r = x + z ;
            document.getElementById("ggg").value = r;
        }
    </script>
</body>
</html>