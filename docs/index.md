# API Documentation

url - domain.com/api/v1

### User Login


URL:
```
/login
```

Method:
```
POST
```

Headers:
```
Content-Type: application/json
```
Request:

```
{
    "email":"email@gmail.com",
    "password":"qwerty"
}
```

Response:

ok Status 200
```
{
  "id": 1,
  "name": "John Doe",
  "email": "john@email.com",
  "api_token": "API_TOKEN"

}
```

error Status 404
```
{
  "error": "user not found"
}
```

### VIDEOS
#### Get all videos

URL:
```
/videos
```

Method:
```
GET
```

Headers:
```
Content-Type: application/json
Authorization: Bearer API_TOKEN
```

Response:

ok Status 200
```
[
 {
    id": 1,
    "title": "Video title",
    "description": "video description",
    "category_id": 7,
    "video": "/videos/229690682(vimeo id)",
    "is_banner": 0,
    "duration": "11:11:11",
    "watch_count": 2,
    "created_at": "2017-09-17 19:28:52",
    "updated_at": "2017-09-28 07:43:13",
    "video_type": "webseries",
    "watchid": "20170917192852",
    "year": "2017",
    "country": "Algeria",
    "length": "full",
    "videoimage":{
        id": 39,
        "admin_video_id": 52,
        "imgBillboard": null,
        "imgHero": null,
        "imgPreview1": null,
        "imgPreview2": "http://domain.loc/images/20170917192852/small_image31505676532preview2.png",
        "imgPreview3": "http://domain.loc/images/20170917192852/preview_image1505676532small1new.png",
        "created_at": "2017-09-17 19:28:53",
        "updated_at": "2017-09-17 19:28:53"
    },
    "category":{
        id": 7,
        "name": "Comedy",
        "picture": "sss",
        "is_series": 0,
        "status": "1",
        "is_approved": 1,
        "created_by": 0,
        "created_at": "2017-07-19 15:37:16",
        "updated_at": "2017-07-19 15:37:16"
    },
    "likes":[]
 },
 {"id": 51, "title": "Agony of a widow (Part 2)", "description": ".....", "category_id": 7,…}
]
```
