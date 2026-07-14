<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {
?>
<style type="text/css">
/* Grid */

.jobwp-company-grid{

    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:30px;
    padding: 10px;
}


/* Card */

.jobwp-company-card{

    position:relative;
    display:flex;
    flex-direction:column;
    background:#fff;
    border:1px solid #e8edf3;
    border-radius:12px;
    padding: 20px;
    transition:.25s;
    box-shadow:0 8px 25px rgba(0,0,0,.04);
}

.jobwp-company-card:hover{

    transform:translateY(-5px);

    border-color:#2271b1;

    box-shadow:0 15px 35px rgba(0,0,0,.08);

}


/* Badge */
/*
.jobwp-company-badge{

    position:absolute;

    top:18px;
    right:18px;

    background:#2271b1;
    color:#fff;

    padding:6px 14px;

    border-radius:30px;

    font-size:13px;

}
*/

.jobwp-company-badge{

    position:absolute;
    top: 15px;
    right: 15px;

    padding: 5px 12px;

    background:#eaf4ff;
    color:#2271b1;

    border:1px solid #c8e0ff;

    border-radius:50px;

    font-size:12px;
    font-weight:600;

}

.jobwp-company-badge span{

    font-weight:700;

}


/* Logo */

.jobwp-company-logo{

    width: 110px;
    height: 110px;
    margin:15px auto 20px;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#fff;
    border:1px solid #edf1f5;
    border-radius:50%;
    overflow: hidden;
}

.jobwp-company-logo img{

    max-width: 75%;
    max-height: 75%;
    object-fit: contain;
}


/* Company */

.jobwp-company-name{
    margin: 0 0 25px;
    text-align: center;
    font-size: 18px;
    line-height: 28px;
    font-weight: 700;
}

.jobwp-company-grid .jobwp-company-name a{
    color:#1d2327;
    text-decoration:none;
}

.jobwp-company-name a:hover{
    color:#2271b1;
}


/* Jobs */

.jobwp-company-jobs{
    margin:0;
    padding:0;
    list-style:none;
    flex:1;
}

.jobwp-company-jobs li{

    border-top:1px solid #edf1f5;

}

.jobwp-company-jobs li:last-child{

    border-bottom:1px solid #edf1f5;

}

.jobwp-company-grid .jobwp-company-jobs a{

    display:flex;
    align-items:center;
    gap: 12px;
    padding: 10px 0;
    color:#444;
    font-size: 13px;
    line-height: 23px;
    text-decoration:none;
    transition:.2s;
}

.jobwp-company-grid p.no-jobs {
    align-items:center;
    color:#666;
    font-size: 13px;
    line-height: 23px;
    text-align: center;
}

.jobwp-company-jobs a:hover{

    color:#2271b1;

    padding-left:8px;
}

.jobwp-job-icon{

    flex:none;

}


/* Button */

.jobwp-company-grid .jobwp-company-card .jobwp-company-button{

    margin-top:25px;

    display:block;

    text-align:center;

    text-decoration:none;

    padding:14px;

    border-radius:8px;

    background:#f5f8fc;

    color:#2271b1;

    font-weight:600;

    transition:.25s;
}

.jobwp-company-grid .jobwp-company-card .jobwp-company-button:hover{

    background:#2271b1;

    color:#fff;

}


/* Tablet */

@media (max-width:991px){

    .jobwp-company-grid{

        grid-template-columns:repeat(2,1fr);

    }

}


/* Mobile */

@media (max-width:600px){

    .jobwp-company-grid{

        grid-template-columns:1fr;

    }
}
</style>
<?php
}
?>