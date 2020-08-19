---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/api/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_e3334fdcd758feeaed04e423a42ce67d -->
## movies/{name}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/movies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/movies/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET movies/{name}`


<!-- END_e3334fdcd758feeaed04e423a42ce67d -->

<!-- START_043203af881984bff0c714ded8800068 -->
## movie/{movie_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/movie/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/movie/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET movie/{movie_id}`


<!-- END_043203af881984bff0c714ded8800068 -->


