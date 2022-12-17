export type User = {
    id: number,
    name: string,
    email: string,
    is_admin: boolean,
    created_at: string,
    updated_at: string
};

export type Term = {
    id: number,
    name: string,
    code: string,
    start: string,
    end: string
}

export type Link = {
    label: string,
    url: string,
    active: boolean
}

export type Paginate<T> = {
    links: Link[],
    data: T[]
}
