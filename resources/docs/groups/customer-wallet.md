# Customer Wallet


## api/customer/wallet




> Example request:

```bash
curl -X POST \
    "http://localhost/api/customer/wallet" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"balance":1820.215125,"customer_id":"doloribus"}'

```

```javascript
const url = new URL(
    "http://localhost/api/customer/wallet"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "balance": 1820.215125,
    "customer_id": "doloribus"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-customer-wallet" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-customer-wallet"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-customer-wallet"></code></pre>
</div>
<div id="execution-error-POSTapi-customer-wallet" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-customer-wallet"></code></pre>
</div>
<form id="form-POSTapi-customer-wallet" data-method="POST" data-path="api/customer/wallet" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-customer-wallet', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-customer-wallet" onclick="tryItOut('POSTapi-customer-wallet');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-customer-wallet" onclick="cancelTryOut('POSTapi-customer-wallet');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-customer-wallet" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/customer/wallet</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>balance</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="balance" data-endpoint="POSTapi-customer-wallet" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>customer_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer_id" data-endpoint="POSTapi-customer-wallet" data-component="body" required  hidden>
<br>

</p>

</form>



