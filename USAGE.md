# Usage

## Auth
### Token
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$response = $client->authenticate('teste@teste.com', 'teste');

$responseStatusCode = $response->getStatusCode(); // 200 OK
$token = $response->token; // Your Bearer Token to use in all endpoints that require authentication
```

### Me
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->authMe();

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$id = $response->id; // Your user id
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
$project = json_decode($response->getContent(), true); // Your created project
```

### Create from Template
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->createProjectFromTemplate('template-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = json_decode($response->getContent(), true); // Your created project from a template
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listProjects();

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$projects = json_decode($response->getContent(), true); // Paginated project list
```

### List Templates
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listTemplates();

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$templates = json_decode($response->getContent(), true); // Paginated template list
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listProject('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = json_decode($response->getContent(), true); // Specific project retrieved by id
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
$project = json_decode($response->getContent(), true); // Your updated project
```

### Clone
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->cloneProject('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = json_decode($response->getContent(), true); // Your cloned project
```

### Set Password
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->setProjectPassword('project-id', 'pasword');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = json_decode($response->getContent(), true); // Your project with a password set.
```

### Publish/unpublish
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->publishProject('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = json_decode($response->getContent(), true); // Your published/unpublished project.
```

### Secure/unsecure
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->secureProject('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$project = json_decode($response->getContent(), true); // Your secured/unsecured project.
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
$emailSent = $response->emailSent; // True if email is sent to the project owner
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
$block = json_decode($response->getContent(), true); // Your created block
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listBlocks('project-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$blocks = json_decode($response->getContent(), true); // Project block list
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listBlock('project-id', 'block-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$block = json_decode($response->getContent(), true); // Your specific project block
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
$block = json_decode($response->getContent(), true); // Your updated project block
```

### Move forward
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->moveBlockForward('project-id', 'block-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$block = json_decode($response->getContent(), true); // Your specific project block moved forward
```

### Move backward
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->moveBlockBackward('project-id', 'block-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$block = json_decode($response->getContent(), true); // Your specific project block moved backward
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
$block = json_decode($response->getContent(), true); // Your cloned block
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
$block = json_decode($response->getContent(), true); // Your created row
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listRows('project-id', 'block-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$rows = json_decode($response->getContent(), true); // Block rows
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listRow('project-id', 'block-id', 'row-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$row = json_decode($response->getContent(), true); // Your specific block row
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
$row = json_decode($response->getContent(), true); // Your updated block row
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
$row = json_decode($response->getContent(), true); // Your cloned row
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
$block = json_decode($response->getContent(), true); // Your created column
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listColumns('project-id', 'block-id', 'row-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$rows = json_decode($response->getContent(), true); // Row columns
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listColumn('project-id', 'block-id', 'row-id', 'column-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$row = json_decode($response->getContent(), true); // Your specific row column
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
$row = json_decode($response->getContent(), true); // Your updated block row
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
$block = json_decode($response->getContent(), true); // Your created content
```

### List
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listContents('project-id', 'block-id', 'row-id', 'column-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$rows = json_decode($response->getContent(), true); // Column contents
```

### Retrieve
```php
<?php

use ProposalPage\Sdk\Client as ProposalPageClient;

$client = new ProposalPageClient();
$client->authenticate('teste@teste.com', 'teste');

$response = $client->listContent('project-id', 'block-id', 'row-id', 'column-id', 'content-id');

$responseStatusCode = $response->getStatusCode(); // 200 Ok
$content = json_decode($response->getContent(), true); // Your specific column content
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
$content = json_decode($response->getContent(), true); // Your updated column content
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
