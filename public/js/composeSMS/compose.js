function Test() {
    var a = $('#comment_text').val();
    var invalidPhone = "";
    if (a == "") {
        alert('Bạn chưa nhập số điện thoại!');
    } else {
        if (a.search(',') != '-1') {
            var s = a.split(',');
            s.forEach(function(element) {
                var isnum = /^\d+$/.test(element);
                var isphone = /((09|03|07|08|05)+([0-9]{8})\b)/g.test(element);
                if (isnum == true && isphone == true) {
                    $('#customers').append('<tr>' +
                        '<td><input type="checkbox" class="chcktbl" id="checkall[]" name="select[]" ></td>' +
                        '<td><button id="delete-record" class="btn"><i class="fa fa-trash"></i></button></td>' +
                        '<td name="phone" class="phone" id="phone">' + element + '</td>' +
                        '<td></td>' +
                        '<td></td>' +
                        '<td></td>' + '</tr>');
                } else {
                    invalidPhone += element + ',';
                }
            });
            if (invalidPhone.length > 0) {
                alert('Check again number Phone:' + invalidPhone);
            }
        } else {
            var isnum = /^\d+$/.test(a);
            var isphone = /((09|03|07|08|05)+([0-9]{8})\b)/g.test(a);
            if (isnum == true && isphone == true) {
                $('#customers').append('<tr>' +
                    '<td><input type="checkbox" class="chcktbl" id="checkall[]" name="select[]" ></td>' +
                    '<td><button id="delete-record" class="btn"><i class="fa fa-trash"></i></button></td>' +
                    '<td name="phone" class="phone" id="phone">' + a + '</td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td></td>' + '</tr>');
            } else {
                alert('Phone valid:' + a);
            }
        }
    }
}

$(".toggle-input").click(function() {
    $(".input-phone").toggle(400);
});

$(".toggle-excel").click(function() {
    $(".input-excel").toggle(400);
});

$(".toggle-group").click(function() {
    $(".select-box").toggle(400);
});

$("#nextdecription").click(function() {
    var rowCount = $('#customers td').children().length;
    if (rowCount < 1) {
        alert('Vui lòng nhập số điện thoại..');
    }
});

//Xóa tất cả value trong bảng
$("#delete-all").click(function() {
    $("#customers td").parent().remove();
});
//Xóa dòng value trong bảng
$("#customers tr").click(function() {
    $(this).remove();
    return false;
});

function btnNext() {
    var service = $('#sendfrom').val();
    var campaign = $('#campaign').val();
    var template = $('#template').val();
    var content = $('#compose_content').val();
    if (service == "" || campaign == "" || template == "" || content == "") {
        alert('Vui lòng nhập đầy đủ các thông tin');
    } else {
        var setcampaign = $('#campaign').val();
        var setcontent = $('#compose_content').val();
        var setservice = $('#sendfrom').val();
        $("#campaignreview").val(setcampaign).change();
        $("#contentsms").val(setcontent).change();
        $("#servicename").val(setservice).change();
        $('#customers .phone').each(function() {
            var numberphone = ($(this).html());
            $('#savefunction').append('<tr>' +
                '<td>' + numberphone + '</td>' +
                '<td>' + setcontent + '</td>' + '</tr>');
        });
    }
}

$("select").change(function() {
    var settemplate = $('#template').val();
    $("#compose_content").val(settemplate).change();
});

//clear value form review compose
$("#btnPrevious").click(function() {
    $(".table td").parent().remove();
    $("#servicename").val("");
    $("#campaignreview").val("");
    $("#contentsms").val("");
});

function checkexists() {
    // var a = [];
    // var dem = 0;
    // var i;
    // var j;
    // var origin = [];
    // $('#customers #phone').each(function() {
    //   a.push(($(this).html()));
    // });
    // for (i = 0; i < a.length; i++) {
    //   for(j = 0; i < origin.length; j++)
    //       if(a[i] == origin[j]) {
    //         dem++;
    //       }
    //       if(dem==0)
    //       origin.push(a[i]);
    //   }console.log(origin);

    var origin = {};
    var dupli = {};
    $('#customers #phone').each(function() {
      var txt = $(this).text();
      if (origin[txt]) {
        dupli = false;
      }
      else {
        origin[txt] = true;
      }
    });
}

function testduplicate() {
  var seen='';
    $('#customers #phone').each(function(){
        var see=$(this).text();
        if(seen.match(see)) {
            $(this).remove();
        } else {
            seen=seen+$(this).text();
        }
    });var seen = {};
    $("td #phone").each(function() {
      var seen=$(this).text();
      if ($(this).html() == "") {
        $(this).remove();
      }
    });
}



document.getElementById("btn1").onclick = function() {
    // Lấy danh sách checkbox
    var checkboxes = document.getElementsByName('select[]');
    // Lặp và thiết lập checked
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = true;
    }
};
// Chức năng bỏ chọn hết
document.getElementById("btn2").onclick = function() {
    // Lấy danh sách checkbox
    var checkboxes = document.getElementsByName('select[]');
    // Lặp và thiết lập Uncheck
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
    }
};
