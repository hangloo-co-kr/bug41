<?php
try {
    // upload path
    $uploadDir = 'C:/APM/source/gab/content/upsoadapi.php';
 
 
    // form filed name
    $fieldName = 'file';
 
    // file name
    $fileName = explode('.', $_FILES[$fieldName]['name']);
 
    //file extension
    $extension = end($fileName);
 
    // temp file name
    $tmpName = $_FILES[$fieldName]['tmp_name'];
 
    // new file name to save
    $newFileName = sha1(microtime());
 
    // file upload path
    $fileUploadPath = "${uploadDir}/${newFileName}.${extension}";
 
    // save file to disk
    move_uploaded_file($tmpName, $fileUploadPath);
 
    // directory name to save conversion result
    $wordDir = 'works';
 
    // execute conversion
    $importPath = "${wordDir}/${newFileName}";
    executeConverter($fileUploadPath, $importPath);
 
    // serialize document data
    // v2.3.0 부터 파일명이 document.word.pb에서 document.pb로 변경됨
    $pbFilePath = "${importPath}/document.pb";
    $serializedData = readPBData($pbFilePath);
 
    // send response
    header('Content-Type: application/json');
    echo json_encode(array(
        'serializedData' => $serializedData,
        'importPath' => $importPath,
    ));
 
} catch (Exception $e) {
    echo $e->getMessage();
    http_response_code(404);
}
 
function executeConverter($inputFilePath, $outputFilePath)
{
    $sedocConverterPath = 'C:/APM/source/gab/SynapEditorPackage/sedocConverter/windows/sedocConverter.exe';
    $fontsDir = 'c:/sedocConverter/fonts';
    $tempDir = 'c:/sedocConverter/tmp';
 
    $cmd = "${sedocConverterPath} -f ${fontsDir} ${inputFilePath} ${outputFilePath} ${tempDir}";
    exec($cmd);
}
 
 
function readPBData($pbFilePath)
{
    $fb = fopen($pbFilePath, 'r');
    $data = stream_get_contents($fb, -1, 16);
    fclose($fb);
 
    $byteArray = unpack('C*', zlib_decode($data));
    // php 5.4.0 미만
    // $byteArray = unpack('C*', gzuncompress($data));
    $serializedData = array_values($byteArray);
 
    return $serializedData;
}



// try {
//     //업로드 디렉토리
//     $uploadDir = 'C:/APM/rookie/gab/upload/img';
 
//     //폼 데이터 이름
//     $fieldName = 'file';
 
//     //파일 이름
//     $fileName = explode('.', $_FILES[$fieldName]['name']);
 
//     //파일 확장자
//     $extension = end($fileName);
 
//     //임시 파일 이름
//     $tmpName = $_FILES[$fieldName]['tmp_name'];
 
//     //저장될 새로운 파일이름
//     $newFileName = sha1(microtime());
 
//     //실제 파일 업로드 경로
//     $fileUploadPath = "${uploadDir}/${newFileName}.${extension}";
 
//     //파일을 저장합니다
//     move_uploaded_file($tmpName, $fileUploadPath);
 
//     //클라이언트로 응답을 보냅니다.
//     header('Content-Type: application/json');
//     echo json_encode(array(
//         'uploadPath' => $fileUploadPath,
//     ));
 
// } catch (Exception $e) {
//     echo $e->getMessage();
//     http_response_code(404);
// }
?>