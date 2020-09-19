<script>
//get user ip 
        /*
        $.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
            var myRegexp=new RegExp("ip=(.*)");
            var myIP=myRegexp.exec(data)[1];
            console.log(myIP);
        });
        */
//這裡是可以抓到IP的function
        function ipLookUp () {
            var shit;
        $.ajax({
            url:'http://ip-api.com/json',
            type:'GET',
            success:function(response){
                
                if(response.countryCode=='TW'){
                    shit='{{url("/ipgood/tw")}}';
                    $.ajax({
                        url:shit,
                        data:{country:'tw'},
                        success:function(myfk){
                            console.log(myfk);
                        }
                    });
                }else{
                    shit='{{url("/ipgood/notw")}}';
                    $.ajax({
                        url:shit,
                        success:function(myfk){
                            console.log(myfk);
                        }
                    });
                }
            }
        }).fail(function(e){
            console.log(e);
        });
        }
    ipLookUp();
    </script>