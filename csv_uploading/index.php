

<?php
 include_once 'db_config.php';
 include_once 'countryapi.php';
 include_once 'currencyapi.php';


?>



<!DOCTYPE html>
<html>
  <head>
  <?php include_once 'header.php'; ?>
  
  </head>
  <body>
  <div class="container py-3">
    <header class="text-center text-white">



      <h1 class="display-4">Bootstrap Datatables</h1>
      
        <!-- FORM UPLOAD FOR CSV START -->

        <div class="d-flex head mb-2">
            <div class="">
                <a href="javascript:void(0);" class="btn btn-success mr-2" onclick="formToggle('importFrm');"><i class="plus"></i> Import countries from csv</a>
            </div>
        </div>

        <!-- COUNTRY CSV file upload form -->
        <div class="col-md-12 bg-dark py-3" id="importFrm" style="display: none;">
            <form action="upload_countries.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="upload to db">
            </form>
        </div>

        
        <!-- FORM UPLOAD FOR CSV END -->
    </header>

    <!-- TABLE FOR CSV DISPLAY START -->
    <div class="row py-3">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-2 bg-white rounded">
            <div class="table-responsive">
              <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row"><div class="col-sm-12 col-md-12">
                  <div class="dataTables_length" id="example_length">
                    </div></div></div><div class="row"><div class="col-sm-12"><table id="example" style="width: 100%;" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                <thead>
                  <tr role="row"><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 18px;">SN</th>
                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 63px;">continent_code</th>
                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 63px;">currency_code</th>
                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 48px;">iso2_code</th>
                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">iso3_code</th>
                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64px;">iso_numeric_code</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 58px;">fips_code</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 58px;">calling_code</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 58px;">common_name</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 58px;">official_name</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 58px;">endonym</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 58px;">demonym</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
                // Get COUNTRIES ROWS FOREACH METHOD
                if($countryArray > 0){
                    foreach ($countryArray as $row) {
                      $value = $row['id'];
                      $continent_code = $row['continent_code'];
                      $currency_code = $row['currency_code'];
                      $iso2_code = $row['iso2_code'];
                      $iso3_code = $row['iso3_code'];
                      $iso_numeric_code = $row['iso_numeric_code'];
                      $fips_code = $row['fips_code'];
                      $calling_code = $row['calling_code'];
                      $common_name = $row['common_name'];
                      $official_name = $row['official_name'];
                      $endonym = $row['endonym'];
                      $demonym = $row['demonym'];
                ?>
                    
                    <tr role="row" class="odd">
                    <td class=""><?php echo $value; ?></td>
                    <td class=""><?php echo $continent_code; ?></td>
                    <td class=""><?php echo $currency_code; ?></td>
                    <td class=""><?php echo $iso2_code; ?></td>
                    <td class=""><?php echo $iso3_code; ?></td>
                    <td class=""><?php echo $iso_numeric_code; ?></td>
                    <td class=""><?php echo $fips_code; ?></td>
                    <td class=""><?php echo $calling_code; ?></td>
                    <td class=""><?php echo $common_name; ?></td>
                    <td class=""><?php echo $official_name; ?></td>
                    <td class=""><?php echo $endonym; ?></td>
                    <td class=""><?php echo $demonym; ?></td>
                    
                  </tr>
                <?php } } else{ ?>
                    <tr><td colspan="16">No member(s) found...</td></tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-5">
              <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                  
                </div>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>

    
  </div>

  <div class="container py-3">
    <header class="text-center text-white">

        <!-- FORM UPLOAD FOR CSV START -->

        <div class="d-flex head mb-2">
            
            <div class="">
                <a href="javascript:void(0);" class="btn btn-success " onclick="currToggle('importcurr');"><i class="plus"></i> Import currency from csv</a>
            </div>
        </div>


        <!-- CURRENCY CSV file upload form -->
        <div class="col-md-12 bg-dark py-3" id="importcurr" style="display: none;">
            <form action="upload_currency.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="upload to db">
            </form>
        </div>
        <!-- FORM UPLOAD FOR CSV END -->
    </header>

    <!-- TABLE FOR CSV DISPLAY START -->
    <div class="row py-3">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-2 bg-white rounded">
            <div class="table-responsive">
              <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row"><div class="col-sm-12 col-md-12">
                  <div class="dataTables_length" id="example_length">
                    </div></div></div><div class="row"><div class="col-sm-12"><table id="example2" style="width: 100%;" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                <thead>
                  <tr role="row"><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 18px;">SN</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 18px;">iso_code</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 28px;">iso_numeric_code</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 58px;">common_name</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 58px;">official_name</th>
                  <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" aria-sort="descending" style="width: 18px;">symbol</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Get COUNTRIES ROWS FOREACH METHOD
                if($currencyArray > 0){
                    foreach ($currencyArray as $row) {
                      $value = $row['id'];
                      $iso_code = $row['iso_code'];
                      $iso_numeric_code = $row['iso_numeric_code'];
                      $common_name = $row['common_name'];
                      $official_name = $row['official_name'];
                      $symbol = $row['symbol'];
                ?>
                    
                    <tr role="row" class="odd">
                    <td class=""><?php echo $value; ?></td>
                    <td class=""><?php echo $iso_code; ?></td>
                    <td class=""><?php echo $iso_numeric_code; ?></td>
                    <td class=""><?php echo $common_name; ?></td>
                    <td class=""><?php echo $official_name; ?></td>
                    <td class=""><?php echo $symbol; ?></td>
                    
                  </tr>
                <?php } } else{ ?>
                    <tr><td colspan="16">No member(s) found...</td></tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-5">
              <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                  
                </div>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>

    
  </div>
  <!-- TABLE FOR CSV DISPLAY END -->
  
  <script type="text/javascript">
        $(function() {
          $(document).ready(function() {
            $('#example').DataTable();
          });
        });
  </script>

<script type="text/javascript">
        $(function() {
          $(document).ready(function() {
            $('#example2').DataTable();
          });
        });
  </script>
  
  <script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
      window.parent.parent.postMessage(["resultsFrame", {
        height: document.body.getBoundingClientRect().height,
        slug: "j1xfcah5"
      }], "*")
    }

    // always overwrite window.name, in case users try to set it manually
    window.name = "result"
  </script>

  <!-- Show/hide CSV upload form -->
  <script>
    function formToggle(ID){
        var element = document.getElementById(ID);
        if(element.style.display === "none"){
            element.style.display = "block";
        }else{
            element.style.display = "none";
        }
    }
  </script>

<script>
    function currToggle(ID){
        var element = document.getElementById(ID);
        if(element.style.display === "none"){
            element.style.display = "block";
        }else{
            element.style.display = "none";
        }
    }
  </script>
  
</body>
</html>