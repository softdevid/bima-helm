<?php
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$action = $_GET['action'];
$kec = $_GET['kec'];
$kurir = $_GET['kurir'];
$asal = $_GET['asal'];
$berat = $_GET['berat'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://paketmu.com/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "action={$action}&kec={$kec}&kurir=" . urlencode($kurir) . "&asal={$asal}&berat={$berat}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: paketmu.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'Cookie: _ga=GA1.1.806082098.1659329053; __oagr=true; _pbjs_userid_consent_data=6683316680106290; _sharedID=a24cb860-883c-43d5-98a8-2b56e627c980; __gads=ID=679f53701118edac:T=1659329052:S=ALNI_MY-Xm7frPf6nK7xTJhotc_uPtTPiw; __gpi=UID=0000082553450ba9:T=1659329052:RT=1659329052:S=ALNI_MY9izy3k5TTfcMJRTtiwpkx3dGd8w; unifiedid=%7B%22TDID%22%3A%22e5142846-90f5-410a-b33f-aad74eb00b5b%22%2C%22TDID_LOOKUP%22%3A%22TRUE%22%2C%22TDID_CREATED_AT%22%3A%222022-07-01T04%3A44%3A17%22%7D; _ga_R293RZWR0B=GS1.1.1659329052.1.1.1659329133.0; cto_bundle=s36r3F8xRkZXczlHJTJCcDlFZU1ldU9xelQwM3p0d3F4MU5lejZ5bWolMkJwYUpzUGtkNTB1Y0c5b1hoY2gwOGgzc2ZrSmZna005dG4zWiUyRmw1QUxtaHclMkZtOXBzaGtIR0ZNQjZRc2NDZjhJejBGclprdk9jNFZ5OFUycEY0RzNTYnVLd01ydWpBRTl5MjBxZ2kwYTByaXRTNHRoZGZqUSUzRCUzRA; cto_bidid=LHXUGl95YXZHUnRqNSUyQjBTRnRvZGd4b2RRQVI0TlZYalF6OXB2cDZuYzVwdnV4JTJCOFRWMzN1TDVzTlM3eG1ReFNadW85VDhOSkZDdnM2MGlwVmh2RDFrM3FzWVZTeXdKeGF6YXRqbkVBYmlrNlkyUm8lM0Q';
$headers[] = 'Origin: https://paketmu.com';
$headers[] = 'Referer: https://paketmu.com/cek-ongkir/';
$headers[] = 'Sec-Ch-Ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36';
$headers[] = 'X-Requested-With: XMLHttpRequest';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
  echo 'Error:' . curl_error($ch);
}

echo $result;

curl_close($ch);
