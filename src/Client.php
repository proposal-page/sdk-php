<?php

namespace ProposalPage\Sdk;

use Appstract\LushHttp\Lush;
use Appstract\LushHttp\Response\LushResponse;
use function BenTools\QueryString\query_string;

class Client
{
    private $apiUrl = 'https://api.proposalpage.com';

    private $token = null;

    private $httpClient;

    public function __construct(string $apiUrl = '')
    {
        if ($apiUrl) {
            $this->apiUrl = $apiUrl;
        }

        $this->httpClient = new Lush();
    }

    // Auth
    public function authenticate(string $username, string $password, bool $setToken = true)
    {
        $response = $this->request('POST', '/accounts/auth/token', [
            'username' => $username,
            'password' => $password
        ]);

        if ($setToken) {
            $this->token = $response->token;
        }

        return $response;
    }

    public function authMe()
    {
        return $this->request('GET', '/accounts/auth/me');
    }

    // Templates
    public function listTemplates($page = 1, $itemsPerPage = 6)
    {
        return $this->request('GET', '/projects/templates', [], [
            'page' => $page,
            'itemsPerPage' => $itemsPerPage
        ]);
    }

    // Projects
    public function createProject(array $params)
    {
        return $this->request('POST', '/projects', $params);
    }

    public function createProjectFromTemplate(string $templateId)
    {
        return $this->request('POST', "/projects/${templateId}/copy");
    }

    public function listProjects($page = 1, $itemsPerPage = 6)
    {
        return $this->request('GET', '/projects', [], [
            'page' => $page,
            'itemsPerPage' => $itemsPerPage
        ]);
    }

    public function listProject($projectId)
    {
        return $this->request('GET', "/projects/{$projectId}");
    }

    public function updateProject($projectId, array $params)
    {
        return $this->request('PUT', "/projects/{$projectId}", $params);
    }

    public function deleteProject($projectId)
    {
        return $this->request('DELETE', "/projects/{$projectId}");
    }

    public function cloneProject($projectId)
    {
        return $this->request('POST', "/projects/{$projectId}/clone");
    }

    public function setProjectPassword($projectId, string $password)
    {
        return $this->request('POST', "/projects/{$projectId}/password", ['password' => $password]);
    }

    public function publishProject($projectId)
    {
        return $this->request('POST', "/projects/{$projectId}/publish");
    }

    public function secureProject($projectId)
    {
        return $this->request('POST', "/projects/{$projectId}/secure");
    }

    public function generateProjectCover($projectId)
    {
        return $this->request('GET', "/projects/{$projectId}/screenshot");
    }

    public function viewProjectAndNotify($projectId)
    {
        return $this->request('PUT', "/projects/{$projectId}/view-and-notify");
    }

    // Blocks
    public function createBlock($projectId, array $params)
    {
        return $this->request('POST', "/projects/{$projectId}/blocks", $params);
    }

    public function listBlocks($projectId)
    {
        return $this->request('GET', "/projects/{$projectId}/blocks");
    }

    public function listBlock($projectId, $blockId)
    {
        return $this->request('GET', "/projects/{$projectId}/blocks/{$blockId}");
    }

    public function updateBlock($projectId, $blockId, array $params)
    {
        return $this->request('PUT', "/projects/{$projectId}/blocks/{$blockId}", $params);
    }

    public function moveBlockForward($projectId, $blockId)
    {
        return $this->request('POST', "/projects/{$projectId}/blocks/{$blockId}/forward");
    }

    public function moveBlockBackward($projectId, $blockId)
    {
        return $this->request('POST', "/projects/{$projectId}/blocks/{$blockId}/backward");
    }

    public function cloneBlock($projectId, $blockId, string $position = '')
    {
        return $this->request('POST', "/projects/{$projectId}/blocks/{$blockId}/clone/{$position}");
    }

    public function deleteBlock($projectId, $blockId)
    {
        return $this->request('DELETE', "/projects/{$projectId}/blocks/{$blockId}");
    }

    // Rows
    public function createRow($projectId, $blockId, array $params)
    {
        return $this->request('POST', "/projects/{$projectId}/blocks/{$blockId}/rows", $params);
    }

    public function listRows($projectId, $blockId)
    {
        return $this->request('GET', "/projects/{$projectId}/blocks/{$blockId}/rows");
    }

    public function listRow($projectId, $blockId, $rowId)
    {
        return $this->request('GET', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}");
    }

    public function updateRow($projectId, $blockId, $rowId, $params)
    {
        return $this->request('PUT', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}", $params);
    }

    public function cloneRow($projectId, $blockId, $rowId, string $position = '')
    {
        return $this->request('POST', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/clone/${position}");
    }

    public function deleteRow($projectId, $blockId, $rowId)
    {
        return $this->request('DELETE', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}");
    }

    // Columns
    public function createColumn($projectId, $blockId, $rowId, array $params)
    {
        return $this->request('POST', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns", $params);
    }

    public function listColumns($projectId, $blockId, $rowId)
    {
        return $this->request('GET', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns");
    }

    public function listColumn($projectId, $blockId, $rowId, $columnId)
    {
        return $this->request('GET', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns/{$columnId}");
    }

    public function updateColumn($projectId, $blockId, $rowId, $columnId, array $params)
    {
        return $this->request('PUT', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns/{$columnId}", $params);
    }

    public function deleteColumn($projectId, $blockId, $rowId, $columnId)
    {
        return $this->request('DELETE', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns/{$columnId}");
    }

    // Contents
    public function createContent($projectId, $blockId, $rowId, $columnId, array $params)
    {
        return $this->request(
            'POST',
            "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns/{$columnId}/contents",
            $params
        );
    }

    public function listContents($projectId, $blockId, $rowId, $columnId)
    {
        return $this->request('GET', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns/{$columnId}/contents");
    }

    public function listContent($projectId, $blockId, $rowId, $columnId, $contentId)
    {
        return $this->request('GET', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns/{$columnId}/contents/{$contentId}");
    }

    public function updateContent($projectId, $blockId, $rowId, $columnId, $contentId, array $params)
    {
        return $this->request(
            'PUT',
            "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns/{$columnId}/contents/{$contentId}",
            $params
        );
    }

    public function deleteContent($projectId, $blockId, $rowId, $columnId, $contentId)
    {
        return $this->request('DELETE', "/projects/{$projectId}/blocks/{$blockId}/rows/{$rowId}/columns/{$columnId}/contents/{$contentId}");
    }

    // Getters / Setters
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    public function setApiUrl(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;

        return $this;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken(string $token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $params
     * @param array $queryStringParams
     * @return LushResponse
     */
    private function request(string $method, string $path, array $params = [], array $queryStringParams = [])
    {
        return $this->httpClient
                ->url($this->getRequestUri($path, $queryStringParams), $params)
                ->headers($this->getRequestHeaders())
                ->$method();
    }

    /**
     * @return array
     */
    private function getRequestHeaders()
    {
        if (!$this->token) {
            return [];
        }

        return [
            'Authorization' => "Bearer {$this->token}"
        ];
    }

    /**
     * @param array $params
     * @return string
     */
    private function getRequestQueryString(array $params = [])
    {
        if (count($params) === 0) {
            return "";
        }

        $queryString = query_string($params);

        return "?" . urldecode((string) $queryString);
    }

    private function getRequestUri(string $path, array $queryStringParams = [])
    {
        $queryString = $this->getRequestQueryString($queryStringParams);

        return "{$this->apiUrl}{$path}{$queryString}";
    }
}
