import { CollectionConfig } from 'payload/types';
import { pageAndPostFields } from '../fields/page-post';

export const Posts: CollectionConfig = {
  slug: 'posts',
  admin: {
    useAsTitle: 'title',
  },
  access: {
    read: () => true,
  },
  fields: pageAndPostFields,
}