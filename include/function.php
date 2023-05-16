<?php
    function clearValue($vl){
        global $mysqli;
        $value = mysqli_real_escape_string($mysqli, $vl);
        if($value != ''){
            $value = strip_tags($value);
            $value = str_replace("'","",$value);
            $value = str_replace('"','',$value);
        }
        return $value;
    }
    
    function getlocation(){
        global $mysqli;
        $data = array();
        $query = "SELECT DISTINCT location_id FROM `job_openings`";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['getJoblocations'][] = array(

                'name'        =>  $row['location_id'],

            );
        }
        return $data;
    }
    
    function getJobCategories(){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `job_category`";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['getJobCategories'][] = array(
                'id'        => $row[id],
                'name'        =>  $row['name'],
                'img'       =>  "/2021-22/perf_cms/storage/app/public/job_category/".$row['img']
            );
        }
        return $data;
    }
    
    function getcount($name){
        global $mysqli;
        $data = array();
        $query = "SELECT COUNT(*) AS t_count FROM `job_openings` WHERE category_id  = '$name'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['count'][] = array(
                'count'        => $row[t_count],
                
            );
        }
        return $data;
                
    }
    
    function getProductCategories(){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `product_category`";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['ProductCategories'][] = array(
                'id'        => $row[id],
                'name'        =>  $row['name'],
                'slug'        =>  $row['slug'],
                'img'       =>  "/2021-22/perf_cms/storage/app/public/product_category/".$row['image']
            );
        }
        return $data;
    }
    
    function getJobs($id){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `job_openings` WHERE category=$id";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['Jobs'][] = array(
                'id'        => $row[id],
                'location_id'        =>  $row['location_id'],
                'title'       =>  $row['title'],
                'text'       =>  $row['text'],
                'category_id'       =>  $row['category_id'],
                
            );
        }
        return $data;
    }
    
    function getJobsbylocation($location,$id){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `job_openings` WHERE category=$id AND location_id='$location'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
             $data['Jobs'][] = array(
                'id'        => $row[id],
                'location_id'        =>  $row['location_id'],
                'title'       =>  $row['title'],
                'text'       =>  $row['text'],
                'category_id'       =>  $row['category_id'],
                
            );
        }
        return $data;
    }
    
    
    function getProductsDetails($slug){
        global $mysqli;
        $data = array();
        $query = "SELECT products.*,product_category.name AS cat_name,brands.title AS brand_name,brands.image as brand_image FROM `products` INNER JOIN product_category ON products.product_category=product_category.id INNER JOIN brands ON products.brand_id = brands.id WHERE products.product_slug='$slug'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['products'][] = array(
                'id'        => $row[id],
                'name'        =>  $row['name'],
                'color'        =>  $row['color'],
                'size_range'        =>  $row['size_range'],
                'short_description'        =>  $row['short_description'],
                'areas_of_application'        =>  $row['areas_of_application'],
                'standard'        =>  $row['standard'],
                'properties'        =>  $row['properties'],
                'height'        =>  $row['height'],
                'categories'        =>  $row['categories'],
                'cat_name'        =>  $row['cat_name'],
                'brand_name'        =>  $row['brand_name'],
                'brand_image'        =>  $row['brand_image'],
                'image'        =>  $row['image'],
                'product_category'=>$row['product_category'],
                'description'=>$row['description'],
                
            );
        }
        return $data;
    }
    
      
    function getProducts($slug,$row){
        global $mysqli;
        $row2 = $row - 10;
        $data = array();
        $query1 = "SELECT COUNT(id) as total_count from products WHERE products.slug='$slug' ";
        //echo "SELECT products.id,products.name,products.color,products.standard,products.properties,products.height,products.image,products.product_slug from products WHERE products.slug='$slug' LIMIT 0,$row ORDER BY FIELD(products.brand_id,11,10,12,9,13)";die;
        $query = "SELECT products.id,products.name,products.color,products.standard,products.properties,products.height,products.image,products.product_slug from products WHERE products.slug='$slug' ORDER BY FIELD(products.brand_id,11,10,12,9,13) LIMIT 0,$row ";
        $result = mysqli_query($mysqli, $query);
         $rowcount=mysqli_num_rows($result);
        $result1 = mysqli_query($mysqli, $query1);
        $row1 = mysqli_fetch_array($result1);
        while ($row = mysqli_fetch_array($result)) {
            $data['products'][] = array(
                'id'        => $row[id],
                'name'        =>  $row['name'],
                'color'        =>  $row['color'],
                'standard'        =>  $row['standard'],
                'properties'   =>  $row['properties'],
                'height'       =>  $row['height'],
                'image'        =>  $row['image'],
                'product_slug'  => $row['product_slug'],
                
                
            );
        }
      
       // echo $row1[0];
        $data['count']=$row1[0];
        $data['num_rows']=$rowcount;
        return $data;
    }
    
    function getfilteredProducts($slug,$row,$standard,$property,$height,$category){
        global $mysqli;
        $query = "SELECT products.id,products.name,products.color,products.standard,products.properties,products.height,products.image,products.product_slug from products WHERE products.slug='$slug' ";
        if($standard != '')
         {
          $query .= "
          AND standard ='".$standard."'
          ";
         }
         if($property != '')
         {
          $query .= "
           AND properties ='".$property."'
          ";
         }
         if($height != '')
         {
          $query .= "
           AND height ='".$height."'
          ";
         }
         if($category != '')
         {
          $query .= "
           AND categories ='".$category."'
          ";
         }
        $row2 = $row - 10;
        $data = array();
        
       
       // echo $query;die;
        
        $result = mysqli_query($mysqli, $query);
        $result1 = mysqli_query($mysqli, $query1);
        $row1 = mysqli_fetch_array($result1);
        while ($row = mysqli_fetch_array($result)) {
            $data['products'][] = array(
                'id'        => $row[id],
                'name'        =>  $row['name'],
                'color'        =>  $row['color'],
                'standard'        =>  $row['standard'],
                'properties'   =>  $row['properties'],
                'height'       =>  $row['height'],
                'image'        =>  $row['image'],
                'product_slug'  => $row['product_slug']
                
            );
        }
      
       // echo $row1[0];
        $data['count']=$row1[0];
        return $data;
    }
    
    function getFilters($type,$slug){
        global $mysqli;
        $data = array();
        $query = "SELECT DISTINCT $type from products WHERE slug='$slug'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['values'][] = array(
               
                'name'        =>  $row[$type],
                
                
            );
        }
        return $data;
    }
    
    function getOtherImages($id){
        global $mysqli;
        $data = array();
        $query = "SELECT  * from other_images WHERE product_id=$id";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['imgs'][] = array(
                'img'        => $row[img],
                
                
            );
        }
        return $data;
    }
    
    function getYearData($val){
        global $mysqli;
        $data = array();
        if($val == 'annual-subsidiaries'){
            $sql ="SELECT DISTINCT year FROM `annual_report_sub` WHERE year<>'Archive' ORDER BY year DESC";
        }else if($val == 'annual-report'){
            $sql ="SELECT DISTINCT year FROM `annual_report` WHERE year<>'Archive' ORDER BY year DESC";
        }else if($val == 'financial-report'){
            $sql ="SELECT DISTINCT year FROM `fin_results` WHERE year<>'Archive' ORDER BY year DESC";
        }else if($val == 'financials-presentations'){
            $sql ="SELECT DISTINCT year FROM `investor_press` WHERE year<>'Archive' ORDER BY year DESC";
        }else if($val == 'cg-report'){
            $sql ="SELECT DISTINCT year FROM `cop_gov_report` WHERE year<>'Archive' ORDER BY year DESC";
        }else if($val == 'shareHolding-pattern'){
            $sql ="SELECT DISTINCT year FROM `share_holding_ptrn` WHERE year<>'Archive' ORDER BY year DESC";
        }else if($val == 'stock-exchange-filings'){
            $sql ="SELECT DISTINCT year FROM `stock_exchange_filings` WHERE year<>'Archive' ORDER BY year DESC";
        }else if($val == 'notices'){
            $sql ="SELECT DISTINCT year FROM `share_notices` WHERE year<>'Archive' ORDER BY year DESC";
        }else if($val == 'scheme-of-arrangement'){
            $sql ="SELECT DISTINCT year FROM `scheme_agreement` WHERE year<>'Archive' ORDER BY year DESC";
        }
        
        $result = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($result)) {
            array_push($data,$row['year']);
        }
        return $data;
    }
    
    function getQtrData($val,$activeYear){
        global $mysqli;
        $data = array();
        $apndSql = '';
        if($activeYear != ""){
            $apndSql = "WHERE year='".$activeYear."'";
        }
        if($val == 'financial-report'){
            $sql ="SELECT DISTINCT quarter FROM `fin_results` ".$apndSql." ORDER BY quarter DESC";
        }else if($val == 'financials-presentations'){
            $sql ="SELECT DISTINCT quarter FROM `investor_press` ".$apndSql." ORDER BY quarter DESC";
        }else if($val == 'cg-report'){
            $sql ="SELECT DISTINCT quarter FROM `cop_gov_report` ".$apndSql." ORDER BY quarter DESC";
        }else if($val == 'shareHolding-pattern'){
            $sql ="SELECT DISTINCT quarter FROM `share_holding_ptrn` ".$apndSql." ORDER BY quarter DESC";
        }else if($val == 'stock-exchange-filings'){
            $sql ="SELECT DISTINCT quarter FROM `stock_exchange_filings` ".$apndSql." ORDER BY quarter DESC";
        }else if($val == 'notices'){
            $sql ="SELECT DISTINCT quarter FROM `share_notices` ".$apndSql." ORDER BY quarter DESC";
        }else if($val == 'scheme-of-arrangement'){
            $sql ="SELECT DISTINCT quarter FROM `scheme_agreement` ".$apndSql." ORDER BY quarter DESC";
        }

        $result = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($result)) {
            array_push($data,$row['quarter']);
        }
        return $data;
    }
    
    function getMediaRealses($page,$year){
        global $mysqli;
        $data['pagination'] = $data['media'] = array();
        $results_per_page = 8;
        
        $data['curentYear'] = $apndUrl = $apndSql = $yr1 = $yr2 = '';
        $year = mysqli_real_escape_string($mysqli, $year);
        if($year!=''){
            $year = strip_tags($year);
            $year = str_replace("'","",$year);
            $year = str_replace('"','',$year);
            $yearArr = explode("-",$year);
            if(count($yearArr) == 2){
                $yr1 = $yearArr[0];
                $yr2 = $yearArr[1];
                $apndUrl = "&year=".$year;
                $data['curentYear'] = $year;
                $apndSql = " WHERE date BETWEEN '".$yr1."-04-01' AND '".$yr2."-03-31'";
            }
        }
        
        $query = "SELECT * FROM `media release`".$apndSql;
        $result = mysqli_query($mysqli, $query);  
        $number_of_result = mysqli_num_rows($result);
        
        $number_of_page = ceil ($number_of_result / $results_per_page);
        
        $page = mysqli_real_escape_string($mysqli, $page);
        $page = (int)$page;
        if($page==''){  
            $page = 1;
        }

        $page_first_result = ($page-1) * $results_per_page;
        
        $query = "SELECT * FROM `media release`".$apndSql." ORDER BY date DESC LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['media'][] = array(
                'dt'        =>  date('d M Y',strtotime($row['date'])),
                'hd'        =>  $row['heading'],
                'tx'        =>  $row['text'],
                'bx'        =>  $row['box1'],
                'lnk'       =>  "../triveni_cms/public/uploads/".$row['pdf_file_name']
            );
        }
        
        if($number_of_page > 1){
            for($pageArr = 1; $pageArr<= $number_of_page; $pageArr++) {
                if($page == $pageArr){
                    $data['pagination'][] = '<a class="current">' . $pageArr . ' </a>';
                }else{
                    $data['pagination'][] = '<a href = "media.php?page=' . $pageArr . $apndUrl . '">' . $pageArr . ' </a>';
                }
                $lastpg = $pageArr;
            }
        }
        
        if(count($data['media']) != 0){
            $product_total = $number_of_result;
            $limit = $results_per_page;
            $data['showingTxt'] = sprintf("Showing %d to %d of %d", ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total);
        }else{
            $data['showingTxt'] = '';
        }
        
        return $data;
    }
    
    function get_storesaddress($location=''){
        global $mysqli;
        $data['storeadreeses'] = array();
        $apndSql = '';
        
        
        if($location != ''){
            $apndSql = " WHERE location='".$location."'";
        }
        
        $query = "SELECT * FROM address_locations".$apndSql." ORDER BY id DESC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['storeadreeses'][] = array(
                'store_address'    =>  $row['store_address'] 
            );
        }
        return $data;
    }
    
    function getAnnualReportSubData($year=''){
        global $mysqli;
        $data['annualReportsSub'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql = " WHERE year='".$year."'";
        }
        
        $query = "SELECT * FROM annual_report_sub".$apndSql." ORDER BY id DESC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['annualReportsSub'][] = array(
                'txt'   =>  $row['title'],
                'lnk'   =>  "../triveni_cms/public/uploads/".$row['link']
            );
        }
        
        return $data;
    }
    
    function getFinancialResultData($year='',$qtr=''){
        global $mysqli;
        $data['financialResult'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql .= " AND year='".$year."'";
        }
        
        if($qtr != ''){
            $apndSql .= " AND quarter='".$qtr."'";
        }
        
        $query = "SELECT * FROM fin_results WHERE title<>''".$apndSql." ORDER BY year DESC,quarter ASC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['financialResult'][] = array(
                'txt'    =>  $row['title'],
                'ftyp'   =>  $row['file_type'],
                'lnk'    =>  "../triveni_cms/public/uploads/".$row['link'],
                'lnk_typ'=>  $row['link_type']
            );
        }
        
        return $data;
    }
    
    function getInvestorPresentationData($year='',$qtr=''){
        global $mysqli;
        $data['investrPresentation'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql .= " AND year='".$year."'";
        }
        
        if($qtr != ''){
            $apndSql .= " AND quarter='".$qtr."'";
        }
        
        $query = "SELECT * FROM investor_press WHERE title<>''".$apndSql." ORDER BY year DESC,quarter ASC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['investrPresentation'][] = array(
                'txt'    =>  $row['title'],
                'lnk'    =>  "../triveni_cms/public/uploads/".$row['link'],
                'lnk_typ'=>  $row['link_type']
            );
        }
        
        return $data;
    }
    
    function getInvEventData($year='',$qtr=''){
        global $mysqli;
        $data['eventData'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql .= " AND year='".$year."'";
        }
        
        if($qtr != ''){
            $apndSql .= " AND quarter='".$qtr."'";
        }
        
        $query = "SELECT * FROM triv_inv_event WHERE title<>''".$apndSql." ORDER BY year DESC,quarter ASC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['eventData'][] = array(
                'txt'    =>  $row['title'],
                'pdf'    =>  $row['pdf'],
                'audio'  =>  $row['audio'],
                'video'  =>  $row['video']
            );
        }
        
        return $data;
    }
    
    function getCorporateGovReportData($year='',$qtr=''){
        global $mysqli;
        $data['copGovResult'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql .= " AND year='".$year."'";
        }
        
        if($qtr != ''){
            $apndSql .= " AND quarter='".$qtr."'";
        }
        
        $query = "SELECT * FROM cop_gov_report WHERE title<>''".$apndSql." ORDER BY year DESC,quarter ASC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['copGovResult'][] = array(
                'txt'    =>  $row['title'],
                'lnk'    =>  "../triveni_cms/public/uploads/".$row['link'],
                'lnk_typ'=>  $row['link_type']
            );
        }
        
        return $data;
    }
    
    function getAuditorCertificateData($year='',$qtr=''){
        global $mysqli;
        $data['auditorData'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql .= " AND year='".$year."'";
        }
        
        if($qtr != ''){
            $apndSql .= " AND quarter='".$qtr."'";
        }
        
        $query = "SELECT * FROM triv_inv_aud_certificate WHERE title<>''".$apndSql." ORDER BY year DESC,quarter ASC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['auditorData'][] = array(
                'txt'    =>  $row['title'],
                'lnk'    =>  $row['link'],
                'lnk_typ'=>  $row['link_type']
            );
        }
        
        return $data;
    }
    
    function getPolicies($page){
        global $mysqli;
        $data['pagination'] = $data['policyData'] = array();
        $results_per_page = 9;
        
        $query = "SELECT * FROM policy";
        $result = mysqli_query($mysqli, $query);  
        $number_of_result = mysqli_num_rows($result);
        
        $number_of_page = ceil ($number_of_result / $results_per_page);
        
        $page = mysqli_real_escape_string($mysqli, $page);
        $page = (int)$page;
        if($page==''){  
            $page = 1;
        }

        $page_first_result = ($page-1) * $results_per_page;
        
        $query = "SELECT * FROM policy ORDER BY id DESC LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['policyData'][] = array(
                'txt'        =>  $row['title'],
                'lnk'        =>  "../triveni_cms/public/uploads/".$row['link'],
                'lnk_type'   =>  $row['link_type']
            );
        }
        
        if($number_of_page > 1){
            for($pageArr = 1; $pageArr<= $number_of_page; $pageArr++) {
                if($page == $pageArr){
                    $data['pagination'][] = '<a class="current">' . $pageArr . ' </a>';
                }else{
                    $data['pagination'][] = '<a href = "corporate-governance.php?q=policies&page=' . $pageArr . '">' . $pageArr . ' </a>';
                }
                $lastpg = $pageArr;
            }
        }
        
        if(count($data['policyData']) != 0){
            $product_total = $number_of_result;
            $limit = $results_per_page;
            $data['showingTxt'] = sprintf("Showing %d to %d of %d", ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total);
        }else{
            $data['showingTxt'] = '';
        }
        
        return $data;
    }
    
    function getShareHoldingPatrn($year='',$qtr=''){
        global $mysqli;
        $data['shareInfoData'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql .= " AND year='".$year."'";
        }
        
        if($qtr != ''){
            $apndSql .= " AND quarter='".$qtr."'";
        }
        
        $query = "SELECT * FROM share_holding_ptrn WHERE title<>''".$apndSql." ORDER BY year DESC,quarter ASC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['shareInfoData'][] = array(
                'txt'    =>  $row['title'],
                'lnk'    =>  "../triveni_cms/public/uploads/".$row['link']
            );
        }
        
        return $data;
    }
    
    //function getUnclaimedDividentData($year='',$qtr=''){
    function getUnclaimedDividentData($year='',$qtr=''){
        global $mysqli;
        $data['unclaimedData'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql .= " AND year='".$year."'";
        }
        
        if($qtr != ''){
            $apndSql .= " AND quarter='".$qtr."'";
        }
        
        $query = "SELECT * FROM unclaimed_div WHERE title<>''".$apndSql." ORDER BY year DESC,quarter ASC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['unclaimedData'][] = array(
                'txt'    =>  $row['title'],
                'lnk'    =>  "../triveni_cms/public/uploads/".$row['link']
            );
        }
        
        return $data;
    }

    function getStockEXhangeData($year='',$qtr=''){
        global $mysqli;
        $data['stockfilings'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql .= " AND year='".$year."'";
        }
        
        if($qtr != ''){
            $apndSql .= " AND quarter='".$qtr."'";
        }
        
        $query = "SELECT * FROM stock_exchange_filings WHERE title<>''".$apndSql." ORDER BY year DESC,quarter ASC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['stockfilings'][] = array(
                'txt'    =>  $row['title'],
                'lnk'    =>  "../triveni_cms/public/uploads/".$row['link']
            );
        }
        
        return $data;
    }
    
    function getShareinfoNoticesData($year=''){
        global $mysqli;
        $data['shareNotices'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql = " WHERE year='".$year."'";
        }
        
        $query = "SELECT * FROM share_notices".$apndSql." ORDER BY id DESC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['shareNotices'][] = array(
                'txt'   =>  $row['title'],
                'lnk'   =>  "../triveni_cms/public/uploads/".$row['link']
            );
        }
        
        return $data;
    }
    
    function getSchemeAgreementData($year=''){
        global $mysqli;
        $data['schemeAgree'] = array();
        $apndSql = '';
        
        if($year != ''){
            $apndSql = " WHERE year='".$year."'";
        }
        
        $query = "SELECT * FROM scheme_agreement".$apndSql." ORDER BY id DESC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['schemeAgree'][] = array(
                'txt'   =>  $row['title'],
                'lnk'   =>  "../triveni_cms/public/uploads/".$row['link']
            );
        }
        
        return $data;
    }
    
    function getBuyBackData(){
        global $mysqli;
        $data['buyBack'] = array();
       
        $query = "SELECT * FROM buy_back ORDER BY id DESC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['buyBack'][] = array(
                'txt'   =>  $row['title'],
                'lnk'   =>  "../triveni_cms/public/uploads/".$row['link']
            );
        }
        
        return $data;
    }
    
    function getMapDetails($busines='',$id=''){
        global $mysqli;
        $data['mapDetails'] = array();
        $apndSql = '';
        
        if($id != ''){
            $apndSql = " AND id='".(int)$id."'";
        }
       
        $query = "SELECT * FROM map_details WHERE business='".$busines."'".$apndSql." ORDER BY location_name ASC";
       
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['mapDetails'][] = array(
                'id'            =>  $row['id'],
                'loc_name'      =>  $row['location_name'],
                'loc_details'   =>  $row['location_details'],
                'iframe'        =>  $row['iframe_link']
            );
        }
        
        return $data;
    }
    
    function getBoardData($type='',$id=''){
        global $mysqli;
        $data['bod'] = array();
        if($type=='bod'){
            if($id > 0){
                $query = "SELECT * FROM `leadership` WHERE (type ='1' or type='0,1') and id=$id";
            }else{
                $query = "SELECT * FROM `leadership` WHERE (type ='1' or type='0,1')";
            }
        }else{
            if($id > 0){
                $query = "SELECT * FROM `leadership` WHERE (type ='0' or type='0,1') and id=$id";
            }else{
                $query = "SELECT * FROM `leadership` WHERE (type ='0' or type='0,1')";
            }
        }
        
        $query .= " ORDER BY sort_no ASC";
        
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['bod'][] = array(
                'id'            =>  $row['id'],
                'name'      =>  $row['name'],
                'des'   =>  $row['des'],
                'img'        =>  $row['img'],
                'txt'        =>  $row['txt'],
            );
        }
        return $data;
    }
    
    function getPageData($pagetitle=''){
        global $mysqli;
        $data = array();
        
        $query = "SELECT * FROM pages WHERE title LIKE '".$pagetitle."%' ORDER BY section_no ASC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data[$row['title']] = array(
                'body'          =>  $row['body'],
                'bnr_img'       =>  $row['banner_image'],
                'bnr_img_mob'   =>  $row['banner_image_mobile'],
                'bnr_txt'       =>  $row['banner_text'],
                'meta_desc'     =>  $row['meta_description'],
                'meta_title'    =>  $row['meta_title']
            );
        }
        return $data;
    }
    
    function getResourceData($type=''){
    global $mysqli;
    $data['resource'] = array();
    
    $query = "SELECT * FROM resource_center WHERE type = '$type'";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($result)) {
        $data['resource'][] = array(
            'id'            =>  $row['id'],
            'title'      =>  $row['title'],
            'description'      =>  $row['description'],
            'file'   =>  $row['file'],
            'created_at'   =>  $row['created_at'],
            'type'=>$row['type'],

        );
    }
    return $data;
    } 
    
    
?>