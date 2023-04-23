<?php

namespace Yoruchiaki\Webase;

use GuzzleHttp\Exception\GuzzleException;
use stdClass;
use Yoruchiaki\Webase\Interfaces\ClientInterface;

/**
 *
 */
class Webase implements ClientInterface
{
    /**
     * @var HttpRequest
     */
    private HttpRequest $http;

    /**
     * @param  HttpRequest  $http
     */
    public function __construct(HttpRequest $http)
    {
        $this->http = $http;
    }


    /**
     * @param $account
     * @param  int  $pageSize
     * @param  int  $pageNumber
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function accountList(int $pageSize, int $pageNumber, string $account = null): stdClass
    {
        return $this->http->request('GET', 'accountList', compact('account', 'pageSize', 'pageNumber'));
    }


    /**
     * @param  string  $appIp
     * @param  int  $appPort
     * @param  string  $appLink
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function appRegister(string $appIp, int $appPort, string $appLink): stdClass
    {
        return $this->http->request('POST', 'appRegister', compact('appIp', 'appPort', 'appLink'));
    }


    /**
     * @return stdClass
     * @throws GuzzleException
     */
    public function roleList(): stdClass
    {
        return $this->http->request('GET', 'roleList');
    }


    /**
     * @param  string  $account
     * @param  string  $accountPwd
     * @param  int  $roleId
     * @param  string  $email
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function accountAdd(string $account, string $accountPwd, int $roleId, string $email): stdClass
    {
        return $this->http->request('POST', 'accountAdd', compact('account', 'accountPwd', 'roleId', 'email'));
    }


    /**
     * @param  string  $account
     * @param  string  $oldAccountPwd
     * @param  string  $newAccountPwd
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function passwordUpdate(string $account, string $oldAccountPwd, string $newAccountPwd): stdClass
    {
        return $this->http->request('POST', 'passwordUpdate', compact('account', 'oldAccountPwd', 'newAccountPwd'));
    }


    /**
     * @return stdClass
     * @throws GuzzleException
     */
    public function basicInfo(): stdClass
    {
        return $this->http->request('GET', 'basicInfo');
    }


    /**
     * @param  int  $groupStatus
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function groupList(int $groupStatus = null): stdClass
    {
        return $this->http->request('GET', 'groupStatus', compact('groupStatus'));
    }


    /**
     * @param  int  $pageSize
     * @param  int  $pageNumber
     * @param  int|null  $groupId
     * @param  int|null  $nodeId
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function nodeList(int $pageSize, int $pageNumber, int $groupId = null, int $nodeId = null): stdClass
    {
        return $this->http->request('GET', 'nodeList', compact('pageSize', 'pageNumber', 'groupId', 'nodeId'));
    }


    /**
     * @param  int|null  $groupId
     * @param  string|null  $nodeId
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function nodeInfo(int $groupId, string $nodeId): stdClass
    {
        return $this->http->request('GET', 'nodeInfo', compact('groupId', 'nodeId'));
    }

    /**
     * @param  int  $groupId
     * @param  string  $nodeId
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function frontNodeList(int $groupId = null, string $nodeId = null): stdClass
    {
        return $this->http->request('GET', 'frontNodeList', compact('groupId', 'nodeId'));
    }

    /**
     * @return stdClass
     * @throws GuzzleException
     */
    public function sdkCert(): stdClass
    {
        return $this->http->request('GET', 'sdkCert');
    }

    /**
     * @param  string  $description
     * @param  string|null  $userName
     * @param  string|null  $groupId
     * @param  string|null  $account
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function newUser(
        string $userName,
        string $groupId,
        string $account,
        string $description = null
    ): stdClass {
        return $this->http->request('POST', 'newUser', compact('description', 'userName', 'groupId', 'account'));
    }

    /**
     * @param  string  $userParam
     * @param  string  $account
     * @param  string  $hasPrivateKey
     * @param  int|null  $groupId
     * @param  int|null  $pageSize
     * @param  int|null  $pageNumber
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function userList(
        int $groupId,
        int $pageSize,
        int $pageNumber,
        string $userParam = null,
        string $account = null,
        int $hasPrivateKey = null
    ): stdClass {
        return $this->http->request('GET', 'userList',
            compact('userParam', 'account', 'hasPrivateKey', 'groupId', 'pageSize', 'pageNumber'));
    }

    /**
     * @param  int|null  $userId
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function userInfo(int $userId): stdClass
    {
        return $this->http->request('GET', 'userInfo', compact('userId'));
    }

    /**
     * @param  string  $description
     * @param  string|null  $privateKey
     * @param  string|null  $userName
     * @param  int|null  $groupId
     * @param  string|null  $account
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function importPrivateKey(
        string $privateKey,
        string $userName,
        int $groupId,
        string $account,
        string $description = null
    ): stdClass {
        return $this->http->request('POST', 'importPrivateKey',
            compact('description', 'privateKey', 'userName', 'groupId', 'account'));
    }

    /**
     * @param  string  $description
     * @param  string|null  $pemContent
     * @param  string|null  $userName
     * @param  string|null  $groupId
     * @param  string|null  $account
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function importPem(
        string $pemContent,
        string $userName,
        string $groupId,
        string $account,
        string $description = null
    ): stdClass {
        return $this->http->request('POST', 'importPem',
            compact('description', 'pemContent', 'userName', 'groupId', 'account'));
    }

    /**
     * @param  string  $p12Password
     * @param  string  $description
     * @param  string  $userName
     * @param  int  $groupId
     * @param  string  $account
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function importP12(
        string $p12File,
        string $userName,
        int $groupId,
        string $account,
        string $p12Password = null,
        string $description = null
    ): stdClass {
        return $this->http->request('POST', 'importP12',
            compact('p12Password', 'description', 'userName', 'groupId', 'account'));
    }

    /**
     * @param  string  $description
     * @param  string  $userName
     * @param  string  $publicKey
     * @param  int  $groupId
     * @param  string  $account
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public
    function importPublicKey(
        string $userName,
        string $publicKey,
        int $groupId,
        string $account,
        string $description = null
    ): stdClass {
        return $this->http->request('POST', 'importP12',
            compact('description', 'userName', 'publicKey', 'groupId', 'account'));
    }

    /**
     * @param  string  $contractName
     * @param  string  $contractSource
     * @param  string  $contractAbi
     * @param  string  $bytecodeBin
     * @param  string  $contractVersion
     * @param  string  $account
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public
    function contractSourceSave(
        string $contractName,
        string $contractSource,
        string $contractAbi,
        string $bytecodeBin,
        string $contractVersion,
        string $account
    ): stdClass {
        return $this->http->request('POST', 'contractSourceSave', [
            'contractList'    => [compact('contractName', 'contractSource', 'contractAbi', 'bytecodeBin')],
            'contractVersion' => $contractVersion,
            'account'         => $account
        ]);
    }

    /**
     * @param  int  $groupId
     * @param  string  $contractName
     * @param  string  $contractPath
     * @param  string  $contractAddress
     * @param  string  $contractVersion
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public
    function contractAddressSave(
        int $groupId,
        string $contractName,
        string $contractPath,
        string $contractAddress,
        string $contractVersion
    ): stdClass {
        return $this->http->request('POST', 'contractAddressSave',
            compact(
                'groupId',
                'contractName',
                'contractPath',
                'contractAddress',
                'contractVersion'
            )
        );
    }

    /**
     * @return stdClass
     * @throws GuzzleException
     */
    public
    function dbInfo(): stdClass
    {
        return $this->http->request('GET', 'dbInfo');
    }
}