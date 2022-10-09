import { init, RematchDispatch, RematchRootState } from "@rematch/core";
import { models, RootModel } from "@/store/models";
import immerPlugin from "@rematch/immer";
import { TypedUseSelectorHook, useDispatch, useSelector } from "react-redux";


export const store = init<RootModel>({
    models: models,
    plugins: [immerPlugin()]
});

export type RootState = RematchRootState<RootModel>;
export type Dispatch = RematchDispatch<RootModel>;

export const useAppSelector: TypedUseSelectorHook<RootState> = useSelector;
export const useAppDispatch = () => useDispatch<Dispatch>();
