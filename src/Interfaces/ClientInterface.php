<?php

namespace Yoruchiaki\Webase\Interfaces;

interface ClientInterface
{

    public function accountList(int $pageSize, int $pageNumber, string $account = null);

    public function appRegister(string $appIp, int $appPort, string $appLink);

    public function roleList();

    public function accountAdd(string $account, string $accountPwd, int $roleId, string $email);

    public function passwordUpdate(string $account, string $oldAccountPwd, string $newAccountPwd);

    public function basicInfo();

    public function groupList(int $groupStatus);

    public function nodeList(int $pageSize, int $pageNumber, int $groupId, int $nodeId);

    public function nodeInfo(int $groupId, string $nodeId);

    public function frontNodeList(int $groupId, string $nodeId);

    public function sdkCert();

    public function newUser(
        string $userName,
        string $groupId,
        string $account,
        string $description = null
    );

    public function userList(
        int $groupId,
        int $pageSize,
        int $pageNumber,
        string $userParam = null,
        string $account = null,
        int $hasPrivateKey = null
    );

    public function userInfo(int $userId);

    public function importPrivateKey(
        string $privateKey,
        string $userName,
        int $groupId,
        string $account,
        string $description = null
    );

    public function importPem(
        string $pemContent,
        string $userName,
        string $groupId,
        string $account,
        string $description = null
    );

    public function importP12(
        string $p12File,
        string $userName,
        int $groupId,
        string $account,
        string $p12Password = null,
        string $description = null
    );

    public function importPublicKey(
        string $userName,
        string $publicKey,
        int $groupId,
        string $account,
        string $description = null
    );

    public function contractSourceSave(
        string $contractName,
        string $contractSource,
        string $contractAbi,
        string $bytecodeBin,
        string $contractVersion,
        string $account
    );

    public function contractAddressSave(
        int $groupId,
        string $contractName,
        string $contractPath,
        string $contractAddress,
        string $contractVersion
    );

    public function dbInfo();
}