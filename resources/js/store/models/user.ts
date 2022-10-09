import { createModel } from "@rematch/core";
import { RootModel } from ".";
import { User } from "@/types";


export const user = createModel<RootModel>()({
    state: {
        user: null as User | null
    },
    reducers: {
        setUser(state, user: User) {
            state.user = user;
        }
    }
});
