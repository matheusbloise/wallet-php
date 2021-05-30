# Financial Operation Wallet


## api/operation/transfer




> Example request:

```bash
curl -X POST \
    "http://localhost/api/operation/transfer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"payer_type":"customer","payer":50180.7621,"payee_type":"customer","payee":2065,"value":394943827.85970694}'

```

```javascript
const url = new URL(
    "http://localhost/api/operation/transfer"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "payer_type": "customer",
    "payer": 50180.7621,
    "payee_type": "customer",
    "payee": 2065,
    "value": 394943827.85970694
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-operation-transfer" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-operation-transfer"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-operation-transfer"></code></pre>
</div>
<div id="execution-error-POSTapi-operation-transfer" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-operation-transfer"></code></pre>
</div>
<form id="form-POSTapi-operation-transfer" data-method="POST" data-path="api/operation/transfer" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-operation-transfer', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-operation-transfer" onclick="tryItOut('POSTapi-operation-transfer');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-operation-transfer" onclick="cancelTryOut('POSTapi-operation-transfer');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-operation-transfer" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/operation/transfer</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>payer_type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="payer_type" data-endpoint="POSTapi-operation-transfer" data-component="body"  hidden>
<br>
The value must be one of <code>customer</code>.
</p>
<p>
<b><code>payer</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="payer" data-endpoint="POSTapi-operation-transfer" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>payee_type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="payee_type" data-endpoint="POSTapi-operation-transfer" data-component="body"  hidden>
<br>
The value must be one of <code>customer</code> or <code>shopkeeper</code>.
</p>
<p>
<b><code>payee</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="payee" data-endpoint="POSTapi-operation-transfer" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>value</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="value" data-endpoint="POSTapi-operation-transfer" data-component="body"  hidden>
<br>

</p>

</form>



