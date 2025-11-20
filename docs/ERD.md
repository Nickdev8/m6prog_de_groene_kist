# ERD - Groene Haven Markt

```mermaid
erDiagram
    USERS {
        int id PK
        varchar email "unique"
        varchar password
        varchar role "admin|editor"
        datetime created_at
    }

    CATEGORIES {
        int id PK
        varchar name
        varchar slug "unique"
        datetime created_at
    }

    PRODUCTS {
        int id PK
        varchar name
        text description
        decimal price "base price"
        int category_id FK
        bool is_active
        datetime created_at
        int created_by FK
    }

    OFFERS {
        int id PK
        int product_id FK
        varchar title
        decimal promo_price
        datetime starts_at
        datetime ends_at
        bool active
    }

    USERS ||--o{ PRODUCTS : "creates"
    USERS ||--o{ OFFERS : "publishes"
    CATEGORIES ||--o{ PRODUCTS : "contains"
    PRODUCTS ||--o{ OFFERS : "has"
```

Opslaan in `docs/` voor referentie bij het opzetten van de database en login.
