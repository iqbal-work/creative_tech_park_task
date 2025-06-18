import { type CategoryType } from "./category";
export interface Product {
  id: number;
  name: string;
  categories: CategoryType[];
}

export type ProductType = Product;