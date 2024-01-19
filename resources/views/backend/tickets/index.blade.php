@extends('admin.admin_dashboard')
@section('admin')
<style>
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: 1600px;
    }
</style>


 <div class="container">
<h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">Главная /</span> Список</h4>

      <div class="row">

          <table class="inputs table">
              <tbody>
              <tr>
                  <td>I/O:<br> <input type="text" id="i_o" name="i_o"></td>
                  <td>Корреспондент: <br><input type="text" id="corres" name="corres"></td>
                  <td>MT: <br><input type="text" id="mt_msg" name="mt_msg"></td>
                  <td>Референс: <br><input type="text" id="ref_msg" name="ref_msg"></td>
                  <td>Дата: <br><input type="text" id="date_msg" name="date_msg"></td>
                  <td>Валюта : <br><input type="text" id="cur_mt" name="cur_mt"></td>
              </tr>
              <tr>
                  <td>Сумма : <br><input type="text" id="sum_mt" name="sum_mt"></td>
                  <td>Мин дата: <br><input type="date" id="start_date_msg" name="start_date_msg"></td>
                  <td>Макс дата: <br> <input type="date" id="end_date_msg" name="end_date_msg"></td>
                  <td>Текст: <br><input type="text" id="pol" placeholder="поиск"> </td>
                  <td></td>
                  <td><button id="reset-filter-btn" class="btn btn-primary mt-2">Сбросить фильтр</button></td>
              </tr>



              </tbody>
          </table>


          <hr>
          <div class="col-md-6 card  d-flex align-items-stretch">



              <div class="card-body" >
                  <div class="table-responsive text-nowrap">

                      <table id="data-table" class="table table-bordered display" style="width:100%">
                          <thead>
                          <tr>
                              <th >I/O</th>
                              <th >Корреспондент</th>
                              <th >МТ</th>
                              <th>Референс</th>
                              <th>Дата</th>
                              <th>Валюта</th>
                              <th>Сумма</th>
                              <th>Текст</th>
                          </tr>
                          </thead>
                      </table>

                  </div>
              </div>
          </div>

          <div class="col-md-6" style="min-height: 900px; background:#fff;" >
              <div class="card mb-4" >
                  <div class="float-end"><button id="print-btn" class="btn btn-primary mt-2 float-end ">Печать <i class="bi bi-printer-fill"></i></button> </div>
                  <div class="card-body" id="card" style="display: none;">
                      <pre><span id="card-column8"> </span> </pre>
                      <!-- Добавьте другие данные по мере необходимости -->
                  </div>


              </div>


          </div>
      </div>
  </div>





@endsection



