# ERD - m6prog_digipost

```mermaid
erDiagram
    RECIPIENTS {
        int id PK
        varchar name
        varchar email 'unique'
        char token 'UUID default'
        datetime created_at
    }

    MESSAGES {
        int id PK
        int recipient_id FK
        varchar subject
        longtext body
        datetime created_at
        datetime read_at
    }

    RECIPIENTS ||--o{ MESSAGES : receives
```

Focus: lange berichten (longtext) en tokens (UUID default) voor toegang.
