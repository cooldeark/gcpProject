<!DOCTYPE html>
<html>
 <head>
  <title>匯入EXCEL 進入 DB</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  
  <div class="container">
   <h3 align="center">Excel 上傳</h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @elseif($message=Session::get('error'))
   <div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/testExcel/import') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
        <input type="password" name="fuck" value="31" style="display:none;"/>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="select_file" /><!--type是file，就可以往後丟檔案-->
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="上傳">
        <button onclick="return false" id="exampleBtn" class="btn btn-primary">範例檔案下載</button>
       </td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">.xls, .xslx</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>
   
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Customer Data</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
        <div id="showDataList">
                <table id="userDataList" class="table table-bordered table-striped">
                  <tr>
                    <th>檔案名稱</th>
                    <th>功能使用</th>
                    
                  </tr>
                  @foreach($loginUserDataList as $index=>$value)
                  <tr id="test">
                    <td><p class="col-md-2" >{{$value->fileName}}</p></td>
                    <td><button onclick="viewFileContent(this.id)" id="{{$value->fileName}}_view" class="btn btn-primary">瀏覽檔案</button>
                      <button onclick="transformFileContent(this.id)" id="{{$value->fileName}}_transform" class="btn btn-primary">下載</button>
                    </td>
                    
                  </tr>
                  @endforeach
                </table>
        </div>
        <div id="showViewFileContent">
          
        </div>
      <table id="showDataTable" style="display:none;" class="table table-bordered table-striped">
       <tr>
       <th>creator</th>
       <th>fileName</th>
        <th>Customer Name</th>
        <th>create_account</th>
        <th>ACNO</th>
        <th>product_name</th>
        <th>invest_money</th>
        <th>index_year</th>
       </tr>
       @foreach($data as $row)
       <tr>
       <td>{{ $row->create_by }}</td>
       <td>{{ $row->fileName }}</td>       
        <td>{{ $row->name }}</td>
        <td>{{ $row->create_account }}</td>
        <td>{{ $row->ACNO }}</td>
        <td>{{ $row->product_name }}</td>
        <td>{{ $row->invest_money }}</td>
        <td>{{ $row->index_year }}</td>
       </tr>
       @endforeach
      </table>
     </div>
    </div>
   </div>
  </div>
  <script>
    function viewFileContent(fileName){
      
      var regexpResult=new RegExp("([^$]*)_");
      var regexpResult=regexpResult.exec(fileName)[1];//get capture value
      // console.log(regexpResult);
      
      $.ajax({
            url:"/getExcelFileContent",
            data:{params:regexpResult},
            type:'GET',
//             dataType:'json',
            success:function(Data){
                var myData=Data;
              //  console.log(myData);
              var showDataTD='',nowDataString;
              //這裡先用迴圈整理出下方資料，然後再跟最後的TH組合
              myData.forEach(element => {
                nowDataString=
                  '<tr>'+
                    '<td>'+element.name+'</td>'+
                    '<td>'+element.create_account+'</td>'+
                    '<td>'+element.ACNO+'</td>'+
                    '<td>'+element.product_name+'</td>'+
                    '<td>'+element.invest_money+'</td>'+
                    '<td>'+element.index_year+'</td>';
                  '</tr>'
                    showDataTD=showDataTD.concat(nowDataString);
                    
              });
              // console.log(showDataTD);
                $('#showViewFileContent').html('<table class="table table-bordered table-striped">'+
                  '<tr>'+
                  '<th>名字</th>'+
                  '<th>開戶日</th>'+
                  '<th>A/C NO</th>'+
                  '<th>產品名稱</th>'+
                  '<th>投資金額</th>'+
                  '<th>INDEX_YEAR</th>'+
                  '</tr>'+
                    showDataTD+
                  '</table>'
                );

            }
        }).fail(function(){
          alert('Error occur please contact your administrator!');
        });
    }

    function transformFileContent(fileName){
      
      var regexpResult=new RegExp("([^$]*)_");
      var regexpResult=regexpResult.exec(fileName)[1];//get capture value
      // console.log(regexpResult);
      window.location.href="{{url('/downLoadFile?params=')}}"+regexpResult;//下載檔案

//       $.ajax({
//             url:"/downLoadPDF",
//             data:{params:regexpResult},
//             type:'GET',
// //             dataType:'json',
//             success:function(Data){
//                 console.log('success');

//             }
//         }).fail(function(){
//           alert('Error occur please contact your administrator!');
//         });
    }
    $('#exampleBtn').click(function(){
      window.location.href="{{url('/downExampleFile')}}";
    });
    
  </script>
 </body>
</html>