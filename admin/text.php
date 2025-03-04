<div id="myDropdown3" class="dropdown-content-header3">
    <div style="height:20px;border-radius:10px 10px 0 0;">
        <i class="fa fa-times" aria-hidden="true" style="color: black;cursor: pointer;font-size: 30px;position: absolute;top: 8px;right: 8px;"></i>
    </div>
    <div class="col-lg-12" style="padding-left:0;padding-right:0;">
        <div class="col-lg-12 text-center mt-2">
            <img src="../assets/images/wechat.png" id="get_wechat" alt="wechat" width="50">
            <h5>Wechat ID</h5>
        </div>
        <div class="col-lg-12 text-center mt-2 mb-1">
            <input type="text" value="<?php echo $row['admin_wechat']; ?>" id="copyLinktext" style="margin: 10px 0px 10px 0;padding: 0 3px 0 3px;border: none;width: 73%;background-color: transparent;text-align:center" readonly />
            <i class="fa fa-clipboard" aria-hidden="true" id="copyLink3" style="position: relative;z-index: 1;top: 13px;right: 10px;float: right;font-size:19px"></i> <br>
            <span id="copy_word1" style="color: green;"></span>
            <br>
        </div>
    </div>
</div>

<style>
body {
padding-bottom: 60px;
}

.sidebar-menu .dropdown {
display: none
}

@media screen and (max-width:767px) {

.sidebar-menu .dropdown {
display: block;
}
}

.dropdown-menu li a {
position: relative;
padding: 8px 0px;
color: black;
}

.table tr:nth-of-type(even) {
background-color: #AFBBC6;
}

.table tr {
color: black;
}

.table-border {
padding: 0;
}

.active-sidebar>a {
font-size: 18px !important;
font-weight: 600 !important;
color: #7EC4A0 !important;
}

table>thead>tr {
color: white !important;
}

.pick {
cursor: pointer;
}

.dropdown-content-header2,
.dropdown-content-header3 {
transition: ease 0.5s;
display: none;
position: absolute;
background-color: #f1f1f1;
top: 192px;
right: 110px;
min-width: 310px;
overflow: auto;
box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
z-index: 1;
border-radius: 10px;
}

.dropdown-content-header3 h5,
.dropdown-content-header2 h5,
.dropdown-content-header2 a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
}

.dropdown-content-header2 a:hover {
background-color: #ddd;
}

.whatsapp_link {
padding: 0 !important;
text-decoration-color: blue !important;
}

.whatsapp_link:hover {
text-decoration: underline !important;
text-decoration-color: blue !important;
background-color: transparent !important
}


.dropdown-show {
display: block;
}

@media screen and (max-width:1156px) {

.dropdown-content-header3,
.dropdown-content-header2 {
transition: ease 0.5s;
right: 50px;
}
}

@media screen and (max-width:1140px) {

.dropdown-content-header3,
.dropdown-content-header2 {
transition: ease 0.5s;
right: 0px;
}
}

@media screen and (max-width:1123px) {

.dropdown-content-header3,
.dropdown-content-header2 {
transition: ease 0.5s;
right: 50px;
}
}

@media screen and (max-width:991px) {

.text-right {
text-align: left !important;
}

.wechat_icon {
margin-bottom: 1rem !important;
}

.dropdown-content-header3,
.dropdown-content-header2 {
transition: ease 0.5s;
right: 0%;
top: 94%;
transform: translate(-50%, 0%);
left: 50%;
}
}


/* */
/*the container must be positioned relative:*/
.custom-select {
position: relative;
font-family: Arial;
}

.custom-select select {
display: none;
/*hide original SELECT element:*/
}

/* .select-selected {
background-color: DodgerBlue;
} */

/*style the arrow inside the select element:*/
.select-selected:after {
position: absolute;
/* content: ""; */
top: 14px;
right: 10px;
width: 0;
height: 0;
border: 6px solid transparent;
border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
/* border-color: transparent transparent #fff transparent; */
top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div {
color: black;
padding: 5px;
border: 1px solid transparent;
border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
cursor: pointer;
user-select: none;
background-color: white;
}

.select-selected {
cursor: pointer;
margin-right: -40px;
margin-left: -10px;
margin-top: -10px;
padding-left: 5px;
padding-top: 11px;
width: 120%;
height: 160%;
color: #7EC4A0;
}

/*style items (options):*/
.select-items {
position: absolute;
/* background-color: DodgerBlue; */
top: 100%;
left: 0;
right: 0;
z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
display: none;
}

.select-items div:hover,
.same-as-selected {
background-color: DodgerBlue;
}

/* */

.custom-select {
cursor: pointer;
width: 100%;
margin: 10px 90px 10px 0;
border: none;
border-radius: 0;
color: #7EC4A0;
}

.custom-select>option {
color: black;
}
</style>


<script>
    $(document).ready(function() {
        $('#menu1').removeClass("active-sidebar");
        $('#menu2').removeClass("active-sidebar");
        $('#menu3').removeClass("active-sidebar");
        $('#menu4').removeClass("active-sidebar");
        $('#menu5').addClass("active-sidebar");
        $('#menu6').removeClass("active-sidebar");

        document.getElementById("copyLink2").onclick = function() {
            var copyText = document.getElementById("copyLink");
            // var copyText2 = document.getElementById("copyLink").value;
            copyText.select();
            document.execCommand('copy');
            $("#copy_word").html("Invite Link Has Been Copied");
        }

        document.getElementById("copyLink3").onclick = function() {
            var copyText = document.getElementById("copyLinktext");
            // var copyText2 = document.getElementById("copyLink").value;
            copyText.select();
            document.execCommand('copy');
            $("#copy_word1").html("Wechat ID Has Been Copied");
        }

        load_data(1);

        function load_data(page, query) {
            $.ajax({
                url: "team-table.php",
                method: "POST",
                data: {
                    role: $("#admin_role").val(),
                    selection: $("#custom-select1").val(),
                    page: page,
                    query: query,
                    admin_id_table: $('#admin_id_table').val()
                },
                success: function(data) {
                    // $('#result').html(data);
                }
            });
        }

        $("#custom-select1").change(function() {
            load_data(1);
        })

        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_text').val();
            load_data(page, query);
        });

        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(1, search);
            } else {
                load_data(1);
            }
        });

        $('#sort_team').change(function() {
            var sort = $(this).val();
            if (sort != '') {
                load_data(1, sort);
            } else {
                load_data(1);
            }
        });

        $(".fa-times").click(function() {
            $(".dropdown-content-header2").css({
                display: "none"
            });

            $(".dropdown-content-header3").css({
                display: "none"
            });
        });

        $("#get_wechat").click(function() {
            if ($(".dropdown-content-header3").css("display") == "none") {
                if ($(".dropdown-content-header2").css("display") == "none") {
                    $(".dropdown-content-header3").css({
                        display: "block"
                    });
                } else {
                    $(".dropdown-content-header2").css({
                        display: "none"
                    });

                    $(".dropdown-content-header3").css({
                        display: "block"
                    });
                }
            } else {
                $(".dropdown-content-header2").css({
                    display: "none"
                });

                $(".dropdown-content-header3").css({
                    display: "none"
                });
            }
        });


        $(".pick").click(function() {
            if ($(".dropdown-content-header2").css("display") == "none") {
                if ($(".dropdown-content-header3").css("display") == "none") {
                    $(".dropdown-content-header2").css({
                        display: "block"
                    });
                } else {
                    $(".dropdown-content-header3").css({
                        display: "none"
                    });

                    $(".dropdown-content-header2").css({
                        display: "block"
                    });
                }
            } else {
                $(".dropdown-content-header3").css({
                    display: "none"
                });

                $(".dropdown-content-header2").css({
                    display: "none"
                });
            }
        });
    });
</script>