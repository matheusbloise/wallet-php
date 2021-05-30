# Shopkeeper


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/shopkeeper" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"page":15,"cpf_cnpj":"ut"}'

```

```javascript
const url = new URL(
    "http://localhost/api/shopkeeper"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "page": 15,
    "cpf_cnpj": "ut"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (404):

```json
{
    "error": "Entity Not Found"
}
```
<div id="execution-results-GETapi-shopkeeper" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shopkeeper"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shopkeeper"></code></pre>
</div>
<div id="execution-error-GETapi-shopkeeper" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shopkeeper"></code></pre>
</div>
<form id="form-GETapi-shopkeeper" data-method="GET" data-path="api/shopkeeper" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shopkeeper', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shopkeeper" onclick="tryItOut('GETapi-shopkeeper');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shopkeeper" onclick="cancelTryOut('GETapi-shopkeeper');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shopkeeper" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shopkeeper</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="page" data-endpoint="GETapi-shopkeeper" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>cpf_cnpj</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="cpf_cnpj" data-endpoint="GETapi-shopkeeper" data-component="body"  hidden>
<br>

</p>

</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/shopkeeper/debitis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/shopkeeper/debitis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "App\\Http\\Controllers\\ShopkeeperController::show(): Argument #1 ($id) must be of type int, string given, called in C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php on line 54",
    "exception": "TypeError",
    "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\app\\Http\\Controllers\\ShopkeeperController.php",
    "line": 85,
    "trace": [
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "show",
            "class": "App\\Http\\Controllers\\ShopkeeperController",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 254,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 103,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 55,
            "function": "handleRequestUsingNamedLimiter",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 52,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 614,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 256,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\symfony\\console\\Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\symfony\\console\\Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\symfony\\console\\Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\mathe\\Desktop\\wallet-php\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETapi-shopkeeper--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shopkeeper--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shopkeeper--id-"></code></pre>
</div>
<div id="execution-error-GETapi-shopkeeper--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shopkeeper--id-"></code></pre>
</div>
<form id="form-GETapi-shopkeeper--id-" data-method="GET" data-path="api/shopkeeper/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shopkeeper--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shopkeeper--id-" onclick="tryItOut('GETapi-shopkeeper--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shopkeeper--id-" onclick="cancelTryOut('GETapi-shopkeeper--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shopkeeper--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shopkeeper/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-shopkeeper--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/api/shopkeeper" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"srice@example.net","cpf_cnpj":"mollitia","full_name":"aut","password":{},"confirmed_password":{}}'

```

```javascript
const url = new URL(
    "http://localhost/api/shopkeeper"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "srice@example.net",
    "cpf_cnpj": "mollitia",
    "full_name": "aut",
    "password": {},
    "confirmed_password": {}
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shopkeeper" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shopkeeper"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shopkeeper"></code></pre>
</div>
<div id="execution-error-POSTapi-shopkeeper" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shopkeeper"></code></pre>
</div>
<form id="form-POSTapi-shopkeeper" data-method="POST" data-path="api/shopkeeper" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shopkeeper', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shopkeeper" onclick="tryItOut('POSTapi-shopkeeper');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shopkeeper" onclick="cancelTryOut('POSTapi-shopkeeper');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shopkeeper" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shopkeeper</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shopkeeper" data-component="body" required  hidden>
<br>
The value must be a valid email address.
</p>
<p>
<b><code>cpf_cnpj</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cpf_cnpj" data-endpoint="POSTapi-shopkeeper" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>full_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="full_name" data-endpoint="POSTapi-shopkeeper" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-shopkeeper" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>confirmed_password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="password" name="confirmed_password" data-endpoint="POSTapi-shopkeeper" data-component="body"  hidden>
<br>

</p>

</form>


## Update the specified resource in storage.




> Example request:

```bash
curl -X PUT \
    "http://localhost/api/shopkeeper/accusamus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"cbednar@example.org","cpf_cnpj":"aut","full_name":"et","password":{},"confirmed_password":{}}'

```

```javascript
const url = new URL(
    "http://localhost/api/shopkeeper/accusamus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "cbednar@example.org",
    "cpf_cnpj": "aut",
    "full_name": "et",
    "password": {},
    "confirmed_password": {}
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-PUTapi-shopkeeper--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-shopkeeper--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-shopkeeper--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-shopkeeper--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-shopkeeper--id-"></code></pre>
</div>
<form id="form-PUTapi-shopkeeper--id-" data-method="PUT" data-path="api/shopkeeper/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-shopkeeper--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-shopkeeper--id-" onclick="tryItOut('PUTapi-shopkeeper--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-shopkeeper--id-" onclick="cancelTryOut('PUTapi-shopkeeper--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-shopkeeper--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/shopkeeper/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-shopkeeper--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-shopkeeper--id-" data-component="body" required  hidden>
<br>
The value must be a valid email address.
</p>
<p>
<b><code>cpf_cnpj</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cpf_cnpj" data-endpoint="PUTapi-shopkeeper--id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>full_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="full_name" data-endpoint="PUTapi-shopkeeper--id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="password" name="password" data-endpoint="PUTapi-shopkeeper--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>confirmed_password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="password" name="confirmed_password" data-endpoint="PUTapi-shopkeeper--id-" data-component="body"  hidden>
<br>

</p>

</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/shopkeeper/sequi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/shopkeeper/sequi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEapi-shopkeeper--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-shopkeeper--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-shopkeeper--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-shopkeeper--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-shopkeeper--id-"></code></pre>
</div>
<form id="form-DELETEapi-shopkeeper--id-" data-method="DELETE" data-path="api/shopkeeper/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-shopkeeper--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-shopkeeper--id-" onclick="tryItOut('DELETEapi-shopkeeper--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-shopkeeper--id-" onclick="cancelTryOut('DELETEapi-shopkeeper--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-shopkeeper--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/shopkeeper/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-shopkeeper--id-" data-component="url" required  hidden>
<br>

</p>
</form>



