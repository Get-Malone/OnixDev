{
    "guards": {
        "web": {
            "driver": "session",
            "provider": "users"
        }
    },
    "providers": {
        "users": {
            "driver": "eloquent",
            "model": "App\\Models\\User"
        }
    },
    "passwords": {
        "users": {
            "provider": "users",
            "table": "password_resets",
            "expire": 60
        }
    }
}