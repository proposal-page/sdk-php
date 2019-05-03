# Usage

## Auth
### Token
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$response = $client->authenticate('teste@teste.com', 'teste');

$responseStatusCode = $response->getStatusCode(); // 200 OK
$token = $response->json['token']; // Your Bearer Token to use in all endpoints that require authentication
```

### Me
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->authMe();

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$id = $response->json['id']; // Your user id
```

## Project
### Create
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->createProject([
   'title' => 'New Project',
   'blocks' => []
]);

$responseStatusCode = $response->getStatusCode(); // 201 Created
$project = $response->json; // Your created project
```

### Create from Template
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->createProjectFromTemplate('template-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = $response->json; // Your created project from a template
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listProjects();

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$projects = $response->json; // Paginated project list
```

### List Templates
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listTemplates();

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$templates = $response->json; // Paginated template list
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listProject('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = $response->json; // Specific project retrieved by id
```

### Update
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->updateProject('project-id', [
   'title' => 'Updated title'
]);

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = $response->json; // Your updated project
```

### Clone
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->cloneProject('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = $response->json; // Your cloned project
```

### Set Password
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->setProjectPassword('project-id', 'pasword');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = $response->json; // Your project with a password set.
```

### Publish/unpublish
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->publishProject('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = $response->json; // Your published/unpublished project.
```

### Secure/unsecure
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->secureProject('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = $response->json; // Your secured/unsecured project.
```

### Generate/regenerate Cover
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->generateProjectCover('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
```

### View and notify
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->viewProjectAndNotify('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$emailSent = $response->json['emailSent']; // True if email is sent to the project owner
```

### Delete
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->deleteProject('project-id');

$responseStatusCode = $response->getStatusCode(); // 204 No content
```

## Block
### Create
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->createBlock('project-id', [
   'description' => 'New Block',
]);

$responseStatusCode = $response->getStatusCode(); // 201 Created
$block = $response->json; // Your created block
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listBlocks('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$blocks = $response->json; // Project block list
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listBlock('project-id', 'block-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$block = $response->json; // Your specific project block
```

### Update
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->updateBlock('project-id', 'block-id', [
    'description' => 'Updated description'
]);

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$block = $response->json; // Your updated project block
```

### Move forward
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->moveBlockForward('project-id', 'block-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$block = $response->json; // Your specific project block moved forward
```

### Move backward
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->moveBlockBackward('project-id', 'block-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$block = $response->json; // Your specific project block moved backward
```

### Clone
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

// Without a specific position (the cloned block will be put a end)
$response = $client->cloneBlock('project-id', 'block-id');

// With a specific position
$response = $client->cloneBlock('project-id', 'block-id', 0);

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$block = $response->json; // Your cloned block
```

### Delete
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

// Without a specific position (the cloned block will be put a end)
$response = $client->deleteBlock('project-id', 'block-id');

$responseStatusCode = $response->getStatusCode(); // 204 No content
```

## Row
### Create
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->createRow('project-id', 'block-id', [
   'description' => 'New Row',
]);

$responseStatusCode = $response->getStatusCode(); // 201 Created
$block = $response->json; // Your created row
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listRows('project-id', 'block-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$rows = $response->json; // Block rows
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listRow('project-id', 'block-id', 'row-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$row = $response->json; // Your specific block row
```

### Update
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->updateRow('project-id', 'block-id', 'row-id', [
    'description' => 'Updated row description'
]);

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$row = $response->json; // Your updated block row
```

### Clone
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

// Without a specific position (the cloned row will be put a end)
$response = $client->cloneRow('project-id', 'block-id', 'row-id');

// With a specific position
$response = $client->cloneRow('project-id', 'block-id', 'row-id', 0);

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$row = $response->json; // Your cloned row
```

### Delete
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->deleteRow('project-id', 'block-id', 'row-id');

$responseStatusCode = $response->getStatusCode(); // 204 No content
```

## Column
### Create
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->createColumn('project-id', 'block-id', 'row-id', [
    'contents' => [],
    'size' => 12
]);

$responseStatusCode = $response->getStatusCode(); // 201 Created
$block = $response->json; // Your created column
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listColumns('project-id', 'block-id', 'row-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$rows = $response->json; // Row columns
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listColumn('project-id', 'block-id', 'row-id', 'column-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$row = $response->json; // Your specific row column
```

### Update
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->updateRow('project-id', 'block-id', 'row-id', [
   'size' => 6
]);

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$row = $response->json; // Your updated block row
```

### Delete
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->deleteColumn('project-id', 'block-id', 'row-id', 'column-id');

$responseStatusCode = $response->getStatusCode(); // 204 No content
```

## Content
### Create
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->createContent('project-id', 'block-id', 'row-id', 'column-id', [
    'type' => 'empty',
    'style' => [],
    'data' => []
]);

$responseStatusCode = $response->getStatusCode(); // 201 Created
$block = $response->json; // Your created content
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listContents('project-id', 'block-id', 'row-id', 'column-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$rows = $response->json; // Column contents
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listContent('project-id', 'block-id', 'row-id', 'column-id', 'content-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$content = $response->json; // Your specific column content
```

### Update
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->updateContent('project-id', 'block-id', 'row-id', 'column-id', 'content-id', [
    'type' => 'text',
    'style' => [],
    'data' => [
        'html' => '<p>Lorem Ipsum</p>'
     ]
]);

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$content = $response->json; // Your updated column content
```

### Delete
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->deleteContent('project-id', 'block-id', 'row-id', 'column-id', 'content-id');

$responseStatusCode = $response->getStatusCode(); // 204 No content
```
