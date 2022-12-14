<script>
  <?php

  use App\Models\Hoadon;
  use App\Models\Nhaphang;
  use App\Models\SanPham;
  use App\Models\User;

  $username = auth()->username;
  $user = User::where('username', $username)->first();
  if ($user->ID_quyen == 1) {
    $hoadon = Hoadon::all();
  } else {
    $hoadon = Hoadon::where('id_cuahang', $user->id_nguoidung)->get();
  }
  $sl = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
  $nhaphang = Nhaphang::where('id_cuahang', $user->id_nguoidung)->get();

  $data = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
  $doanhthu = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
  $loinhuan = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

  foreach ($hoadon as $hoadon) :
    $data[date_format($hoadon->created_at, " m") - 1] += $hoadon->soluong;
    $doanhthu[number_format(date_format($hoadon->created_at, " m") - 1)] += $hoadon->soluong * $hoadon->sanpham->gia;
    if ($user->ID_quyen == 1) :
      $loinhuan[number_format(date_format($hoadon->created_at, " m") - 1)] += ($hoadon->soluong * $hoadon->sanpham->gia) * 2 / 100;
    else :

      // $sanpham=SanPham::where('id',$hoadon->id_sanpham)->first();
      $loinhuan[number_format(date_format($hoadon->created_at, " m") - 1)] += ($hoadon->soluong * ($hoadon->sanpham->gia - 45000));
    endif;

  endforeach;

  // foreach ($nhaphang as $nhaphang):
  //   $doanhthu[(int)substr($nhaphang->ngaynhap,5,2)-2]-=$data[(int)substr($nhaphang->ngaynhap,5,2)-1]*$nhaphang->gia;
  //   endforeach;

  ?>
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }

  var ctx = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        "Th??ng 1",
        "Th??ng 2",
        "Th??ng 3",
        "Th??ng 4",
        "Th??ng 5",
        "Th??ng 6",
        "Th??ng 7",
        "Th??ng 8",
        "Th??ng 9",
        "Th??ng 10",
        "Th??ng 11",
        "Th??ng 12",
      ],
      datasets: [{
        label: "Doanh thu",

        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: <?php echo json_encode($doanhthu) ?>,
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'month'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 12
          },
          maxBarThickness: 25,
        }],
        yAxes: [{
          ticks: {
            min: 0,

            maxTicksLimit: 12,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return number_format(value) + ' VN??';
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' VN??';
          }
        }
      },
    }
  });




  var ctx = document.getElementById("myChart").getContext("2d");

  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        "Th??ng 1",
        "Th??ng 2",
        "Th??ng 3",
        "Th??ng 4",
        "Th??ng 5",
        "Th??ng 6",
        "Th??ng 7",
        "Th??ng 8",
        "Th??ng 9",
        "Th??ng 10",
        "Th??ng 11",
        "Th??ng 12",
      ],
      datasets: [{
        label: "S??? l?????ng",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: <?php echo json_encode($data) ?>,
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'month'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 12
          },
          maxBarThickness: 25,
        }],
        yAxes: [{
          ticks: {
            min: 0,

            maxTicksLimit: 12,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' s???n ph???m';
          }
        }
      },
    }
  });



  var ctx = document.getElementById("loinhuan").getContext("2d");

  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        "Th??ng 1",
        "Th??ng 2",
        "Th??ng 3",
        "Th??ng 4",
        "Th??ng 5",
        "Th??ng 6",
        "Th??ng 7",
        "Th??ng 8",
        "Th??ng 9",
        "Th??ng 10",
        "Th??ng 11",
        "Th??ng 12",
      ],
      datasets: [{
        label: "L???i nhu???n",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: <?php echo json_encode($loinhuan) ?>,
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'month'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 12
          },
          maxBarThickness: 25,
        }],
        yAxes: [{
          ticks: {
            min: 0,

            maxTicksLimit: 12,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' VN??';
          }
        }
      },
    }
  });
</script>