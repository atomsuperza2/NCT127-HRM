<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="row">
          <div class="col-md-12">
            <h3><center>ใบแจ้งการลา</center></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h5 align="right"><b>เขียนที่:</b> {{$leaves->writeAt}} </h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4"><b>วันที่เขียน:</b> ..........................................................................<br></br></div>
          <div class="col-md-4"></div>
        </div>
        <div class="row">
          <div class="col-md-4"><b>เรื่อง:</b> ขอ{{$leaves->leavestype->leavestype}}</div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
        <div class="row">
          <div class="col-md-4"><b>เรียน:</b> {{$leaves->dear}}</div><br></br>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <b>ข้าพเจ้า: </b>&nbsp&nbsp {{$leaves->accountinfo->name}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <b>ตำแหน่ง: </b>&nbsp&nbsp <?php if ($leaves->designation !== null): ?>
              {{ $leaves->designation->designationName}}
            <?php endif; ?> <?php if ($leaves->designation == null): ?>
              n/a
            <?php endif; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <b>สังกัดแผนก: </b>&nbsp&nbsp <?php if ($leaves->department !== null): ?>
              {{ $leaves->department->departmentName}}
            <?php endif; ?> <?php if ($leaves->department == null): ?>
              n/a
            <?php endif; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <b>ขอลา: </b>&nbsp&nbsp {{ $leaves->leavestype->leavestype}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <b>เนื่องจาก: </b>&nbsp&nbsp {{ $leaves->reason}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br></br>
            <b>ตั้งแต่วันที่: </b>&nbsp&nbsp {{ $leaves->dateFrom}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <b>ถึงวันที่: </b>&nbsp&nbsp {{ $leaves->dateTo}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br></br>
            <b>ในระหว่างลาสามรถติดต่อข้าพเจ้าได้ที่หมายเลข: </b>&nbsp&nbsp {{ $leaves->accountinfo->phone}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br></br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6"><center><b>ขอแสดงความนับถือ</b></center><br></br></div>
        </div>
        <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6"><center><b>(ลงชื่อ)</b>..............................................................................</center></div>
        </div>
        <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6"><center>(&nbsp&nbsp{{$leaves->accountinfo->name}}&nbsp&nbsp)</center></div>
        </div>
      </div>
    </div>
  </body>
</html>
