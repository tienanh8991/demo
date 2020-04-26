<?php


class MemberManager
{
    public function checkName($name)
    {
        $pattern = '/^[a-z]+$/';
        if (preg_match($pattern,$name)){
            return true;
        }else{
            return false;
        }
    }
    public function checkEmail($email)
    {
        $pattern = '/^\w+[a-zA-Z0-9\.]*[^\.]@[a-z]+\.[a-z]+$/';
        if (preg_match($pattern,$email)){
            return true;
        }else{
            return false;
        }
    }
    public function checkUserName($userName)
    {
        $pattern = '/^[a-z]+$/';
        if (preg_match($pattern,$userName)){
            return true;
        }else{
            return false;
        }
    }
    public function checkPassWord($passWord)
    {
        $pattern = '/^[a-z]+$/';
        if (preg_match($pattern,$passWord)){
            return true;
        }else{
            return false;
        }
    }
    public function checkPhone($phone)
    {

        $regexp1 = '/^03[2-9]{1}\d{7}$/';
        $regexp2 = '/^09[0-46-8]{1}\d{7}$/';
        $regexp3 = '/^08[1-689]{1}\d{7}$/';
        $regexp4 = '/^07[06-9]{1}\d{7}$/';
        if (preg_match($regexp1, $phone) ||
            preg_match($regexp2, $phone) ||
            preg_match($regexp3, $phone) ||
            preg_match($regexp4, $phone))
        {
            return true;
        } else {
            return false;
        }
    }
    function checkBirthDay($birthDay)
    {
        $regexp1 = '/^20[01]{1}\d{1}\-\d{2}\-\d{2}$/';
        $regexp2 = '/^19\d{2}\-\d{2}\-\d{2}$/';
        if (preg_match($regexp1, $birthDay) || preg_match($regexp2, $birthDay)) {
            return true;
        } else {
            return false;
        }
    }
    public function getDataJsonMember($filePath)
    {
        $dataJson = file_get_contents($filePath);
        return json_decode($dataJson);
    }
    public function saveDataJson($member,$filePath)
    {
        $dataMember = [
            'name' => $member->getName(),
            'email' => $member->getEmail(),
            'phone' => $member->getPhone(),
            'userName' =>$member->getUserName(),
            'passWord' =>$member->getPassWord(),
            'gender' =>$member->getGender(),
            'birthDay' => $member->getBirthDay()
        ];
        $dataArray = $this->getDataJsonMember($filePath);
        array_push($dataArray,$dataMember);
        $dataJson = json_encode($dataArray);
        file_put_contents($filePath,$dataJson);
    }
    public function changeDataJson($filePath,$dataArray)
    {
        $dataJson = json_encode($dataArray);
        file_put_contents($filePath,$dataJson);
    }
}