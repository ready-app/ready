import { defineStore } from "pinia";
import { User } from "../types";

type State = {
    user: User | null
};

export const useUserStore = defineStore("user", {
    state: () => {
        return {
            user: null
        } as State;
    },
    actions: {
        setUser(user: User | null) {
            this.user = user;
        }
    }
});
