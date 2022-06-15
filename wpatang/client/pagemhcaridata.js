let qs = window.location.search;
let urlP = new URLSearchParams(qs);
let nim = urlP.get("nim");

let urltarget = new URL("http://localhost/pemweb_B/server/dtmhsnim.php");
urltarget.searchParams.set("nim",nim);

const gh = new XMLHttpRequest();
gh.open("GET",urltarget);
gh.send();

gh.onload = function(){
    const dta = JSON.parse(this.responseText);
    console.log(dta["isi"]);
    for(i=0;i<dta["isi"].length;i++){
        document.getElementById("txnim").value = dta["isi"][i][0];
        document.getElementById("txnama").value = dta["isi"][i][1];
        document.getElementById("txtglahir").value = dta["isi"][i][4];
        document.getElementById("txjkel").value = dta["isi"][i][3];
        document.getElementById("txjur").value = dta["isi"][i][2];
    }

}